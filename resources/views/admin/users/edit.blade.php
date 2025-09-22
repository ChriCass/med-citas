@component('layouts.admin', [
    'breadcrumbs' => [
        ['name' => 'Dashboard', 'route' => route('admin.dashboard')],
        ['name' => 'Usuarios', 'route' => route('admin.users.index')],
        ['name' => 'Editar'],
    ],
    'title' => 'Usuarios | Citas',
])
    <x-wire-card>
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf

            @method('PUT')

            <div class="space-y-4 my-4">
                <div class="grid lg:grid-cols-2 gap-4">
                    <x-wire-input placeholder="ingrese un nombre de usuario" teal value="{{ old('name', $user->name) }}"
                        label="Nombre" name="name" required />

                    <x-wire-input placeholder="ingrese un email" type="email" teal value="{{ old('email', $user->email) }}"
                        label="Email" name="email" required />

                    <x-wire-input placeholder="ingrese una contraseña segura" type="password" teal label="Contraseña"
                        name="password" />
                    <x-wire-input placeholder="Confirmar contraseña" type="password" teal label="Confirmar Contraseña"
                        name="password_confirmation" />

                    <x-wire-maskable name="dni" label="DNI" mask="########" value="{{ old('dni', $user->dni) }}"
                        placeholder="Ingrese DNI" />
                    <x-wire-input placeholder="ingrese un numero de contacto" teal value="{{ old('phone', $user->phone) }}"
                        label="telefono/celular" name="phone" />

                </div>

                <x-wire-input placeholder="ingrese direccion" teal value="{{ old('address', $user->address) }}"
                    label="Direccion" name="address" />
                <x-wire-native-select label="Rol" name="role_id" placeholder="Seleccione un rol">
                    <option value="">Seleccione un rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @selected(old('role_id', optional($user->roles->first())->id) == $role->id)>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </x-wire-native-select>



            </div>


            <div class="flex justify-end">
                <x-wire-button teal type="submit">
                    <i class="fa-solid fa-save mr-1"></i>
                    Actualizar
                </x-wire-button>
            </div>
        </form>
    </x-wire-card>
@endcomponent
