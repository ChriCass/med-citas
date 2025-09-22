@component('layouts.admin', [
    'breadcrumbs' => [
        ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
        ['name' => 'Usuarios', 'route' => route('admin.users.index')],
        ['name' => 'Nuevo'],
    ],
    'title' => 'Usuarios | Citas',
])
    <x-wire-card>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="space-y-4 my-4">
                <div class="grid lg:grid-cols-2 gap-4">
                    <x-wire-input placeholder="ingrese un nombre de usuario" teal value="{{ old('name') }}" label="Nombre"
                        name="name" required />

                    <x-wire-input placeholder="ingrese un email" type="email" teal value="{{ old('email') }}"
                        label="Email" name="email" required />

                    <x-wire-input placeholder="ingrese una contraseña segura" type="password" teal label="Contraseña"
                        name="password" required />
                    <x-wire-input placeholder="Confirmar contraseña" type="password" teal label="Confirmar Contraseña"
                        name="password_confirmation" required />

                    <x-wire-maskable name="dni" label="DNI" mask="########" value="{{ old('dni') }}"
                        placeholder="Ingrese DNI" />
                    <x-wire-input placeholder="ingrese un numero de contacto" teal value="{{ old('phone') }}"
                        label="telefono/celular" name="phone" />

                </div>

                <x-wire-input placeholder="ingrese direccion" teal value="{{ old('address') }}" label="Direccion"
                    name="address" />

                <x-wire-native-select label="Rol" placeholder="Seleccione un rol" name="role_id" :options="$roles"
                    option-label="name" option-value="id" :selected="old('role_id')" />
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
