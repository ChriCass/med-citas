@component('layouts.admin', [
    'breadcrumbs' => [
        ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
        ['name' => 'Pacientes', 'route' => route('admin.patients.index')],
        ['name' => 'Editar'],
    ],
    'title' => 'Pacientes | Citas',
])
    <x-wire-card>
        <form action="{{ route('admin.patients.update', $patient) }}" method="POST">
            @csrf
            @method('PUT')
          

            <div class="flex justify-end">
                <x-wire-button teal type="submit">
                    <i class="fa-solid fa-save mr-1"></i>
                    Guardar
                </x-wire-button>
            </div>
        </form>
    </x-wire-card>
@endcomponent
