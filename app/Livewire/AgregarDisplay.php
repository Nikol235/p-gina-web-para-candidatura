<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Agregar;

class AgregarDisplay extends Component
{
    public $agregars;

    protected $listeners = ['agregarUpdated' => 'loadAgregars'];

    public function mount()
    {
        $this->loadAgregars();
    }

    public function loadAgregars()
    {
        $this->agregars = Agregar::all(); // o paginate si quieres
    }

    public function render()
    {
        // PASAMOS $agregars a la vista
        return view('livewire.agregar-display', [
            'agregars' => $this->agregars
        ]);
    }
}
