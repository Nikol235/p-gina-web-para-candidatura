<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;

class ClientDisplay extends Component
{
    public $clients;

    protected $listeners = ['clientUpdated' => 'loadClients'];

    public function mount()
    {
        $this->loadClients();
    }

    public function loadClients()
    {
        $this->clients = Client::all(); // o paginate si quieres
    }

    public function render()
    {
        // PASAMOS $clients a la vista
        return view('livewire.client-display', [
            'clients' => $this->clients
        ]);
    }
}
