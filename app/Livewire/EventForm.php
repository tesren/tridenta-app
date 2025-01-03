<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class EventForm extends Component
{
    public function save()
    {
        $this->validate(); 
        $this->protectAgainstSpam();

        $msg = new Message();

        $msg->name = $this->full_name;
        $msg->email = $this->email;
        $msg->phone = $this->phone;
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
        $webhookUrl = 'https://hooks.zapier.com/hooks/catch/4710110/3fvqx5c/';

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
            'created_at' => $msg->created_at,
        ];

        // Enviar la solicitud POST al webhook
        $response = Http::post($webhookUrl, $data);


        session()->flash('message', 'Mensaje enviado existosamente');

        $this->reset();

    }
    
    public function render()
    {
        return view('livewire.pages.guest.event-form')->layout('layouts.public-base');
    }
}
