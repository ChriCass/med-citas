@component('layouts.admin', [
    'breadcrumbs' => [
        ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
        ['name' => 'Roles', 'route' => route('admin.roles.index')],
        ['name' => 'Nuevo'],
    ],
    'title' => 'Roles | Citas',
])
    <x-wire-card>
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <x-wire-input placeholder="ejem:Doctor,Cajero,etc..." teal value="{{ old('name') }}" label="Nombre del Rol"
                    name="name" required />
            </div>




            <div class="flex justify-end">
                <x-wire-button teal type="submit">
                    <i class="fa-solid fa-save mr-1"></i>
                    Guardar
                </x-wire-button>
            </div>
        </form>
    </x-wire-card>
@endcomponent
