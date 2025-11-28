<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Noticias;

class NoticiasDisplay extends Component
{
    public $noticias;

    protected $listeners = ['noticiasUpdated' => 'loadNoticias'];

    public function mount()
    {
        $this->loadNoticias();
    }

    public function loadNoticias()
    {
        $this->noticias = Noticias::all(); // o paginate si quieres
    }

    public function render()
    {
        // PASAMOS $noticias a la vista
        return view('livewire.noticias-display', [
            'noticias' => $this->noticias
        ]);
    }
}
