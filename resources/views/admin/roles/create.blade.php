@component('layouts.admin', [
    'breadcrumbs' => [
        ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
        ['name' => 'Roles' , 'route' => route('admin.roles.index')],
         ['name' => 'Nuevo']
    ],
    'title' => 'Roles | Citas'
])

@endcomponent