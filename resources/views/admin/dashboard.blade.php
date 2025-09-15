@component('layouts.admin', [
    'breadcrumbs' => [
        ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
        ['name' => 'Prueba']
    ],
    'title' => 'dashboard | citas'
])
    <h1>hola desde el admin</h1>
@endcomponent