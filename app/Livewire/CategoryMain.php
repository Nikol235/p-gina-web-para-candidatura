<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Category;

class CategoryMain extends Component
{
    use WithPagination, WithFileUploads;

    public $category_id, $name, $description, $image, $oldImage, $search = '';
        public $isOpen = false; // <-- FALTABA ESTO

    // Evento que escucha eliminación confirmada
    protected $listeners = [
        'delItem' => 'deleteConfirmed'
    ];

    public function render()
    {
        $categories = Category::where('name', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.category-main', compact('categories'));
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->category_id = null;
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
    $category = Category::findOrFail($id);

    $this->category_id = $category->id;
    $this->name = $category->name;
    $this->description = $category->description;
    $this->oldImage = $category->image;

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
        $validated['image'] = $this->image->store('categories', 'public');
    } else {
        $validated['image'] = $this->oldImage;
    }

    Category::updateOrCreate(
        ['id' => $this->category_id],
        $validated
    );

    $this->dispatch('$modalClose', 'edit-profile');
    $this->resetFields();

    session()->flash('message', 'Guardado correctamente.');
}

    /**
     * ⚠️ CORRECCIÓN: Livewire v3 NO recibe un array, sino parámetros directos.
     * Por eso debe ser: deleteConfirmed($category)
     */
    public function deleteConfirmed($category)
    {
        Category::find($category)?->delete();
        session()->flash('message', 'Eliminado correctamente.');
    }
}
