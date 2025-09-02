<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Store $store)
    {   
        
        //logear usuario
        $user = Auth::user();
        //verificar que el usuario pertenece a la tienda
        $store = $user->store;

        // Mostrar solo los usuarios de esta tienda
        $users = $store->users()->with('roles')->get();       
        return view('users.index', compact('users', 'store'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Store $store)
    {   
        //logear usuario
        $user = Auth::user();
        $store = $user->store; // tienda del usuario logueado

        //formulario para crear usuarios segun roles
        $roles = Role::all(); // Obtener todos los roles disponibles
        // Pasar los roles a la vista
        // Mostrar el formulario de creación de usuario y pasar la tienda
        return view('users.create', compact('store', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Store $store)
    {
        //guardar un nuevo usuario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = $store->users()->create([
            //relacion con la tienda
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'company_id' => $store->company_id, // Asignar la compañía de la tienda
        ]);

        $user->assignRole($validated['role']); // Asignar el rol seleccionado al usuario

        return redirect()->route('stores.users.index',[$store->id])
            ->with('success', 'Usuario creado exitosamente.');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //mostrar usuarios segun la tienda
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //editar usuario
        return view('users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $store = Auth::user()->store; // la tienda del usuario logueado
    
        // Validar datos, ignorando el email del usuario actual
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required',
        ]);
    
        // Actualizar datos del usuario
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        $user->company_id = $store->company_id; // asignar compañía de la tienda
        $user->store_id = $store->id;          // asegurar que pertenece a la tienda
    
        $user->save();
    
        // Actualizar rol
        $user->syncRoles([$validated['role']]);
    
        return redirect()->route('users.index')
                         ->with('success', 'Usuario actualizado exitosamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //eliminar usuario
        $user->delete();
        return redirect()->route('stores.users.index', [$user->store_id])
                         ->with('success', 'Usuario eliminado exitosamente.');
                         
    }
}
