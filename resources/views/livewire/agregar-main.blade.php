<div>
    <div class="text-2xl mb-6">Planilla electoral</div>

    <div class="flex gap-3 mb-4">
        <flux:input
            wire:model.live="search"
            icon="magnifying-glass"
            placeholder="Buscar agregar..."
        />

        <flux:modal.trigger name="edit-profile">
            <flux:button
                wire:click="create()"
                variant="primary"
                icon="plus"
                class="cursor-pointer"
            >
                Agregar
            </flux:button>
        </flux:modal.trigger>
    </div>

    @include('livewire.agregar-create')

    <div class="flex items-center justify-center">
        <table class="border-separate w-full border-spacing-y-2 text-sm">
            <thead class="bg-gray-500 text-gray-100">
                <tr>
                    <th class="th-class">ID</th>
                    <th class="th-class">Imagen</th>
                    <th class="th-class">Nombre</th>
                    <th class="th-class">Descripción</th>
                    <th class="th-class">Opciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($agregars as $item)
                    <tr>
                        <td class="td-class">{{ $item->id }}</td>

                        <td class="td-class">
                            @if ($item->image)
                                <img src="{{ asset( $item->image) }}"
                                     class="w-12 h-12 rounded-md border object-cover">
                            @else
                                <span class="text-gray-400">Sin imagen</span>
                            @endif
                        </td>

                        <td class="td-class">{{ $item->name }}</td>
                        <td class="td-class">{{ $item->description ?? '—' }}</td>

                        <td class="td-class">
                            <flux:button
                                wire:click="edit({{ $item->id }})"
                                icon="pencil-square"
                                size="xs"
                            />
                            <flux:button
                                wire:click="$dispatch('deleteItem', { id: {{ $item->id }} })"
                                variant="danger"
                                icon="trash"
                                size="xs"
                            />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $agregars->links() }}
    </div>

    @push('js')
        <script>
            Livewire.on('deleteItem', data => {
                Swal.fire({
                    title: '¿Seguro?',
                    text: 'No podrás revertir esto.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                }).then(result => {
                    if (result.isConfirmed) {

                        Livewire.dispatch('delItem', {
                            agregar: data.id
                        });

                        Swal.fire(
                            'Eliminado',
                            'El ítem ha sido eliminado.',
                            'success'
                        );
                    }
                });
            });
        </script>
    @endpush

</div>
