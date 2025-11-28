
<div>
    {{-- DIV PRINCIPAL: Contiene todo el componente --}}

    <div class="text-2xl mb-6">Planilla electoral</div>
    <div class="flex gap-3 mb-4">
        {{-- CAMPO DE BÚSQUEDA --}}
        <flux:input
            wire:model.live="search"
            {{-- wire:model.live = Busca en tiempo real mientras escribes --}}
            {{-- Conecta este campo con la variable $search en el componente Livewire --}}

            icon="magnifying-glass"
            placeholder="Buscar categoría..."
        />

        {{-- BOTÓN PARA ABRIR MODAL DE AGREGAR --}}
        <flux:modal.trigger name="edit-profile">
            {{-- Este botón abre un modal (ventana emergente) llamado "edit-profile" --}}

            <flux:button
                wire:click="create()"
                {{-- Al hacer clic, ejecuta la función create() del componente Livewire --}}
                {{-- Esta función prepara el formulario para agregar una nueva categoría --}}

                variant="primary"
                icon="plus"
                class="cursor-pointer"
            > Agregar
            </flux:button>
        </flux:modal.trigger>
    </div>

    @include('livewire.category-create')
    {{--
        Este archivo está en: resources/views/livewire/category-create.blade.php
    --}}
    <div class="flex items-center justify-center">
        <table class="border-separate w-full border-spacing-y-2 text-sm">
            {{-- ENCABEZADO DE LA TABLA --}}
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
                @foreach ($categories as $item)

                    <tr>

                        <td class="td-class">{{ $item->id }}</td>
                        {{--
                            td = Celda de datos (table data)
                            {{ $item->id }} = Muestra el ID de la categoría
                            Las llaves dobles {{ }} imprimen el valor en pantalla
                        --}}

                        {{-- COLUMNA: IMAGEN --}}
                        <td class="td-class">
                            @if ($item->image)
                                {{--
                                    @if = Condición: si la categoría tiene imagen
                                    Verifica si el campo "image" tiene un valor
                                --}}

                                <img src="{{ asset('plantilla/' . $item->image) }}"
                                     {{--
                                        asset() = Genera la URL completa de la imagen
                                        'plantilla/' . $item->image = Combina la carpeta con el nombre del archivo
                                     --}}

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
                                {{--
                                    Al hacer clic, ejecuta la función edit() con el ID de la categoría
                                    Esto carga los datos de esta categoría en el formulario para editarlos
                                --}}

                                icon="pencil-square"
                                size="xs"
                            />

                            <flux:button
                                wire:click="$dispatch('deleteItem', { id: {{ $item->id }} })"
                                {{--
                                    $dispatch = Envía un evento llamado 'deleteItem'
                                    { id: {{ $item->id }} } = Envía el ID de la categoría
                                --}}

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

        {{ $categories->links() }}
    </div>

    {{-- SECCIÓN DE JAVASCRIPT --}}
    @push('js')
        {{--
            @push = Agrega código JavaScript al final de la página
            'js' = Nombre de la sección donde se insertará este código
        --}}

        <script>
            Livewire.on('deleteItem', data => {
                /*
                    Livewire.on() = Escucha eventos enviados desde Livewire
                    'deleteItem' = Nombre del evento que se envió con $dispatch
                    data = Datos recibidos (contiene el ID de la categoría)
                */
                Swal.fire({
                    /*
                        Swal.fire() = Muestra una alerta bonita (SweetAlert2)
                        Es una ventana emergente para confirmar la eliminación
                    */

                    title: '¿Seguro?',
                    text: 'No podrás revertir esto.'
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                }).then(result => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delItem', {
                            category: data.id
                        });
                        Swal.fire(
                            'Eliminado',
                            'La categoría ha sido eliminada.',
                            'success'
                        );
                    }

                });
            });
        </script>
    @endpush


</div>
