<?php

namespace App\Livewire;

use App\Mail\NewLead;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\Validate; 
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;

class ContactPage extends Component
{
    use UsesSpamProtection;

    #[Validate('required')] 
    public $full_name = '';
 
    #[Validate('required')] 
    public $email = '';

    public $phone = '';

    #[Validate('required')] 
    public $contact_method = '';
    
    public $message = '';
    public $url = '';

    public HoneypotData $extraFields;
    
    public function mount()
    {
        $this->extraFields = new HoneypotData();
        $this->url = request()->fullUrl();
    }

    public function render()
    {
        return view('livewire.pages.guest.contact-page')->layout('layouts.public-base');
    }

    public function save()
    {
        $this->validate(); 
        $this->protectAgainstSpam();


        $msg = new Message();

        $msg->name = $this->full_name;
        $msg->email = $this->email;
        $msg->phone = $this->phone;
        $msg->method = $this->contact_method;
        $msg->content = $this->message;
        $msg->url = $this->url;

        $msg->save();


        //para el webhook
        $type = "Contacto desde el sitio web de Tridenta Towers";


        if( app()->getLocale() == 'es' ){
            $lang = 'Español';
        }
        else{
            $lang = 'Inglés';
        }

        //Envíamos webhook
        $webhookUrl = 'https://cloud.punto401.com/webhook/c7277fea-e8df-41b6-bbae-a3c66cbf77d5';

        // Datos que deseas enviar en el cuerpo de la solicitud
        $data = [
            'name' => $msg->name,
            'email' => $msg->email,
            'phone' => $msg->phone,
            'url' => $msg->url,
            'method' => $msg->method,
            'content' => $msg->content,
            'interest' => 'Condominios',
            'development' => 'Tridenta Towers',
            'lang' => $lang,
            'type'  => $type,
            'created_at' => $msg->created_at,
        ];

        $n8nUser = env('N8N_AUTH_USER');
        $n8nPass = env('N8N_AUTH_PASS');

        // Enviar la solicitud POST al webhook
        $response = Http::withBasicAuth($n8nUser, $n8nPass)->post($webhookUrl, $data);
        

        $email = Mail::to('info@domusvallarta.com')->bcc('ventas@punto401.com');
    
        //$email = Mail::to('erick@punto401.com');
        
        $email->send(new NewLead($msg));

        session()->flash('message', 'Mensaje enviado existosamente');

        $this->reset();

    }
}
