<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\Validate; 
use Illuminate\Support\Facades\Http;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;

class EventForm extends Component
{
    use UsesSpamProtection;

    #[Validate('required')] 
    public $full_name = '';
 
    #[Validate('required')] 
    public $email = '';

    public $phone = '';
    public $message = '';
    public $url = '';
    public $lang = '';
    public $agent = '';

    public HoneypotData $extraFields;
    public $agents = [];
    
    public function save()
    {
        $this->validate(); 
        $this->protectAgainstSpam();

        //para el webhook
        $type = "Confirmación de asistencia al evento de presentación de Tridenta Towers";

        $msg = new Message();

        $msg->name = $this->full_name;
        $msg->email = $this->email;
        $msg->phone = $this->phone;
        $msg->content = $this->message;
        $msg->url = $this->url;

        $msg->save();

        if( $this->lang == 'es' ){
            $lang = 'Español';
        }
        else{
            $lang = 'Inglés';
        }

        $lead_agent = User::find($this->agent);

        //Envíamos webhook
        $webhookUrl = 'https://hooks.zapier.com/hooks/catch/4710110/2zoo44d/';

        // Datos que deseas enviar en el cuerpo de la solicitud
        $data = [
            'name' => $msg->name,
            'email' => $msg->email,
            'phone' => $msg->phone,
            'url' => $msg->url,
            'content' => $msg->content,
            'interest' => 'Condominios',
            'development' => 'Tridenta Towers',
            'lang' => $lang,
            'type'  => $type,
            'agent' => $lead_agent->name,
            'agent_email' => $lead_agent->email,
            'created_at' => $msg->created_at,
        ];

        // Enviar la solicitud POST al webhook
        $response = Http::post($webhookUrl, $data);


        session()->flash('message', 'Mensaje enviado existosamente');

        $this->reset();

    }

    public function mount()
    {
        $this->url = url()->current();
        $this->extraFields = new HoneypotData();
        $this->agents = User::where('role', 'agent')->orderBy('name', 'asc')->get();
    }
    
    public function render()
    {
        return view('livewire.pages.guest.event-form')->layout('layouts.public-base');
    }
}
