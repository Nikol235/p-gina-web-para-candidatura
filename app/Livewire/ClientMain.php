<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Client;

class ClientMain extends Component
{
    use WithPagination, WithFileUploads;

    public $client_id, $name, $description, $image, $oldImage, $search = '';
    public $isOpen = false;

    protected $listeners = [
        'delItem' => 'deleteConfirmed'
    ];

    public function render()
    {
        $clients = Client::where('name', 'like', "%{$this->search}%")
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.client-main', compact('clients'));
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->client_id = null;
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
        $client = Client::findOrFail($id);

        $this->client_id = $client->id;
        $this->name = $client->name;
        $this->description = $client->description;
        $this->oldImage = $client->image;

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
            $validated['image'] = $this->image->store('clients', 'public');
        } else {
            $validated['image'] = $this->oldImage;
        }

        Client::updateOrCreate(
            ['id' => $this->client_id],
            $validated
        );

        $this->dispatch('$modalClose', 'edit-profile');
        $this->resetFields();

        session()->flash('message', 'Guardado correctamente.');
    }

    public function deleteConfirmed($client)
    {
        Client::find($client)?->delete();
        session()->flash('message', 'Eliminado correctamente.');
    }
}
