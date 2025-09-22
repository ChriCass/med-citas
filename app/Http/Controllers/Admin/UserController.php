<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'dni' => 'required|string|max:8|unique:users',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'role_id' => 'required|exists:roles,id'
        ]);

        $user = User::create($data);

        $user->roles()->attach($data['role_id']);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Usuario creado correctamente!',
            'text' => 'El nuevo usuario ha sido agregado y ya está disponible en la lista.'
        ]);

        return redirect()
            ->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'dni' => 'required|string|max:8|unique:users,dni,' . $user->id,
            'phone' => 'nullable|string|max:15|unique:users,phone,' . $user->id,
            'address' => 'nullable|string|max:255',
            'role_id' => 'required|exists:roles,id',
        ]);



        $user->update($data);

        if ($request->password) {
            $user->password = bcrypt($request->password);
            $user->save();
        }


        $user->roles()->sync([$data['role_id']]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Usuario actualizado!',
            'text' => 'Los datos del usuario fueron modificados correctamente.'
        ]);

        return redirect()->route('admin.users.edit', $user);
    }


    /**
     * Remove the specified resource from storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        if (auth()->id() === $user->id) {
            session()->flash('swal', [
                'icon'  => 'error',
                'title' => 'Acción no permitida',
                'text'  => 'No puedes eliminar tu propio usuario.',
            ]);

            return redirect()->route('admin.users.index');
        }



        $user->roles()->detach();


        $user->delete();


        session()->flash('swal', [
            'icon'  => 'success',
            'title' => '¡Usuario eliminado!',
            'text'  => 'El usuario fue eliminado correctamente y ya no aparece en la lista.',
        ]);

        return redirect()->route('admin.users.index');
    }
}
