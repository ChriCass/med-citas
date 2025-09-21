@component('layouts.admin', [
    'breadcrumbs' => [
        ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
        ['name' => 'Roles' , 'route' => route('admin.roles.index')],
         ['name' => 'Editar']
    ],
    'title' => 'Roles | Citas'
])
    <x-wire-card>
        <form action="{{ route('admin.roles.update', $role) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <x-wire-input teal value="{{ old('name', $role->name) }}" label="Nombre del Rol" name="name" required />



            <div class="flex justify-end">
                <x-wire-button teal  type="submit">
                    <i class="fa-solid fa-save mr-1"></i>
                    Actualizar
                </x-wire-button>
            </div>
        </form>
    </x-wire-card>
@endcomponent