<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryDisplay extends Component
{
    public $categories;

    protected $listeners = ['categoryUpdated' => 'loadCategories'];

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = Category::all(); // o paginate si quieres
    }

    public function render()
    {
        // PASAMOS $categories a la vista
        return view('livewire.category-display', [
            'categories' => $this->categories
        ]);
    }
}
