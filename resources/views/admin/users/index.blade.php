@component('layouts.admin', [
    'breadcrumbs' => [['name' => 'Dashboard', 'route' => route('admin.dashboard')], ['name' => 'Usuarios']],
    'title' => 'Usuarios | Citas',
])
    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.users.create') }}">
            <i class="fa-solid fa-plus mr-1"></i>
            Nuevo
        </x-wire-button>
    </x-slot>

    @livewire('admin.datatables.user-table')
@endcomponent
