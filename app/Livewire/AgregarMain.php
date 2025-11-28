<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Agregar;

class AgregarMain extends Component
{
    use WithPagination, WithFileUploads;

    public $agregar_id, $name, $description, $image, $oldImage, $search = '';
    public $isOpen = false;

    protected $listeners = [
        'delItem' => 'deleteConfirmed'
    ];

    public function render()
    {
        $agregars = Agregar::where('name', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.agregar-main', compact('agregars'));
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->agregar_id = null;
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
        $agregar = Agregar::findOrFail($id);

        $this->agregar_id = $agregar->id;
        $this->name = $agregar->name;
        $this->description = $agregar->description;
        $this->oldImage = $agregar->image;

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
            $validated['image'] = $this->image->store('agregars', 'public');
        } else {
            $validated['image'] = $this->oldImage;
        }

        Agregar::updateOrCreate(
            ['id' => $this->agregar_id],
            $validated
        );

        $this->dispatch('$modalClose', 'edit-profile');
        $this->resetFields();

        session()->flash('message', 'Guardado correctamente.');
    }

    public function deleteConfirmed($agregar)
    {
        Agregar::find($agregar)?->delete();
        session()->flash('message', 'Eliminado correctamente.');
    }
}
