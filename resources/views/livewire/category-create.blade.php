<flux:modal name="edit-profile" wire:model="isOpen" class="backdrop-blur">

    <div class="p-4 space-y-3">

        <h2 class="text-xl font-semibold mb-3">
            {{ $category_id ? 'Editar Categoría' : 'Agregar Categoría' }}
        </h2>

        <div class="space-y-2">


            <flux:input
                label="Nombre"
                wire:model="name"
                placeholder="Nombre de la categoría"
            />
            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror


            <flux:textarea
                label="Descripción"
                wire:model="description"
                placeholder="Descripción (opcional)"
            ></flux:textarea>


            <div>
                <label class="text-sm font-medium">Imagen</label>
                <input type="file" wire:model="image" class="mt-1">
                @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            @if ($image)
                <div class="mt-2">
                    <img src="{{ $image->temporaryUrl() }}" class="w-24 h-24 rounded-md object-cover border">
                </div>
            @endif

            @if ($oldImage)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$oldImage) }}" class="w-24 h-24 rounded-md object-cover border">
                </div>
            @endif

        </div>

        <div class="flex justify-end gap-2 mt-4">
            <flux:button flat wire:click="$set('isOpen', false)">Cancelar</flux:button>

            <flux:button
                wire:click="save"
                variant="primary"
                icon="check"
            >
                Guardar
            </flux:button>
        </div>

    </div>

</flux:modal>
