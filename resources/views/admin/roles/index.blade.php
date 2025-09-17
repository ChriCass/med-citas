@component('layouts.admin', [
    'breadcrumbs' => [
        ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
        ['name' => 'Roles']
    ],
    'title' => 'Roles | Citas'
])

@endcomponent