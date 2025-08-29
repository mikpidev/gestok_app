<?php
namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        // Lógica para listar las tiendas
        $stores = Store::all();
        return view(('store.index'), compact('stores')); 
    }

    public function create()
    {
        // Lógica para mostrar el formulario de creación de tienda ya inclye la compania previamente creada   
        return view('store.create', compact('companies'));
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'store_name' => 'required|max:200',
            'address' => 'required',
            'phone' => 'required|size:8',
            'manager' => 'required|max:100',
            'email' => 'required|email|max:100|unique:stores,email',
            'status' => 'required|in:activa,suspendida,inactiva',
            'comments' => 'nullable',
        ]);

        // Creación de la tienda
        $store = Store::create($validated);

        // Redirecciona a la creación de la información fiscal
        return redirect()->route('StoreTaxInfo.create', $store->id)
                         ->with('success', 'Tienda creada exitosamente. Crear Informacion Tributaria '); // Redirige a la creación de la información fiscal
    }

    public function show(Store $store)
    {

        // Lógica para mostrar los detalles de una tienda incluye la compañia y la informacion tributaria
        return view('store.show', compact('store'));

    }

    public function edit(Store $store)
    {
        // Lógica para mostrar el formulario de edición de una tienda
        return view('store.edit', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'store_name' => 'required|max:200',
            'address' => 'required',
            'phone' => 'required|size:8',
            'manager' => 'required|max:100',
            'email' => ['required','email','max:100', Rule::unique('stores')->ignore($store->id)->whereNull('deleted_at'),],  // Solo verifica registros activos
            'status' => 'required|in:activa,suspendida,inactiva',
            'comments' => 'nullable',
        ]);

        // Actualización de la tienda
        $store->update($validated);

        return redirect()->route('store.index')->with('success', 'Tienda actualizada exitosamente.');
    }

    public function destroy(Store $store)
    {
        // Lógica para eliminar una tienda (soft delete)
        $store->delete();
        return redirect()->route('store.index')->with('success', 'Tienda eliminada exitosamente.');
    }
}

