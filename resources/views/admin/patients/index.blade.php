@component('layouts.admin', [
    'breadcrumbs' => [['name' => 'Dashboard', 'route' => route('admin.dashboard')], ['name' => 'Pacientes']],
    'title' => 'Pacientes | Citas',
])
    {{-- @livewire('admin.datatables.patient-table') --}}


    <x-slot name="action">
        <x-wire-button blue href="{{ route('admin.patients.create') }}">
            <i class="fa-solid fa-plus mr-1"></i>
            Nuevo
        </x-wire-button>
    </x-slot>
@endcomponent
