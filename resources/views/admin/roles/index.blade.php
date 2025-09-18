@component('layouts.admin', [
    'breadcrumbs' => [['name' => 'Dashboard', 'route' => route('admin.dashboard')], ['name' => 'Roles']],
    'title' => 'Roles | Citas',
])
    @livewire('admin.datatables.role-table')

 <x-slot name="action">
    <x-wire-button blue href="{{ route('admin.roles.create') }}">
        <i class="fa-solid fa-plus mr-1"></i>
        Nuevo
    </x-wire-button>
</x-slot>
@endcomponent
