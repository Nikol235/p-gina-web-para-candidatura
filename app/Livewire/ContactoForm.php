<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contacto;

class ContactoForm extends Component
{
    public $name, $email, $subject, $message;

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:5',
        ]);

        Contacto::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->reset(); // limpiar campos

        $this->dispatch('sent');
    }

    public function render()
    {
        return view('livewire.contacto-form');
    }
}
