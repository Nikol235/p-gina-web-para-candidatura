<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Noticias;

class NoticiasMain extends Component
{
    use WithPagination, WithFileUploads;

    public $noticia_id, $name, $description, $image, $oldImage, $search = '';
    public $isOpen = false;

    protected $listeners = [
        'delItem' => 'deleteConfirmed'
    ];

    public function render()
    {
        $noticias = Noticias::where('name', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.noticias-main', compact('noticias'));
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->noticia_id = null;
        $this->name = '';
        $this->description = '';
        $this->image = null;
        $this->oldImage = null;
    }

    public function create()
    {
        $this->resetFields();
        $this->dispatch('open-modal', name: 'edit-profile');
    }

    public function edit($id)
    {
        $noticia = Noticias::findOrFail($id);

        $this->noticia_id = $noticia->id;
        $this->name = $noticia->name;
        $this->description = $noticia->description;
        $this->oldImage = $noticia->image;

        $this->dispatch('open-modal', name: 'edit-profile');
    }

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $validated['image'] = $this->image->store('noticias', 'public');
        } else {
            $validated['image'] = $this->oldImage;
        }

        Noticias::updateOrCreate(
            ['id' => $this->noticia_id],
            $validated
        );

        $this->dispatch('$modalClose', 'edit-profile');
        $this->resetFields();

        session()->flash('message', 'Guardado correctamente.');
    }

    public function deleteConfirmed($noticia)
    {
        Noticias::find($noticia)?->delete();
        session()->flash('message', 'Eliminado correctamente.');
    }
}
