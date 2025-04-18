<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get(); // Traer usuarios con sus roles
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // Obtener todos los roles
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name', // Validar que el rol exista
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => 'assets/avatar.jpg', // Imagen por defecto
        ]);

        $user->assignRole($request->role); // Asignar rol al usuario

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id); // Trae el usuario con su rol
        return view('admin.users.show', compact('user'));
    }
    

    public function edit()
    {
        $user = auth()->user();
        $roles = Role::all(); // Obtener todos los roles disponibles
    
        return view('admin.users.edit', compact('user', 'roles'));
    }
    
    
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validación de imagen
        ]);
    
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        // Guardar la imagen si el usuario subió una nueva
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = 'storage/' . $avatarPath;
        }
    
        if (auth()->user()->hasRole('admin') && $request->has('role')) {
            $request->validate([
                'role' => 'required|exists:roles,name',
            ]);
            $user->syncRoles([$request->role]);
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Datos actualizados correctamente.');
    }
    
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
