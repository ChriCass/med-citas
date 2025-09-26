@component('layouts.admin', [
    'breadcrumbs' => [
        ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
        ['name' => 'Pacientes', 'route' => route('admin.patients.index')],
        ['name' => 'Detalle'],
    ],
    'title' => 'Pacientes | Citas',
])
    <x-wire-card>
      
    </x-wire-card>
@endcomponent
