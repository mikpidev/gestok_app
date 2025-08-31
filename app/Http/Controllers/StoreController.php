<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Validation\Rule;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        // Lógica para listar las tiendas
        $stores = Store::all();
        $companies = Company::all(); // <-- agregamos las compañías
        return view(('store.index'), compact('stores', 'companies')); 
    }

    public function create(Company $company)
    {   
        //pasar info para crear tienda 
        

        // Lógica para mostrar el formulario de creación de tienda ya inclye la compania previamente creada   
        return view('store.create', compact('company'));
    }

    public function store(Request $request, Company $company)
    {
        $validated = $request->validate([
            'store_name' => 'required|max:200',
            'address'    => 'required',
            'phone'      => 'required|size:8',
            'manager'    => 'required|max:100',
            'email'      => 'required|email|unique:stores,email',
            'status'     => 'required|in:activa,suspendida,inactiva',
            'comments'   => 'nullable',
        ]);
    
        $store = $company->stores()->create($validated);
    
        return redirect()->route('stores_tax_info.create', ['store' => $store->id])
        ->with('success', 'Tienda creada, ahora crea la información fiscal de la tienda.');

    }
    

    public function show(Store $store, Company $company)
    {

        //validar que la tienda tiene la compañia y la informacion tributaria
        $store->load('taxInfo','company');
        
        // Lógica para mostrar los detalles de una tienda incluye la compañia y la informacion tributaria
        return view('store.show', compact('store'));

    }

    public function edit(Store $store)
    {
        //$store = Store::findOrFail($id);
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

        return redirect()->route('stores.index')->with('success', 'Tienda actualizada exitosamente.');
    }

    public function destroy(Store $store)
    {
        // Lógica para eliminar una tienda (soft delete)
        $store->delete();
        return redirect()->route('store.show')->with('success', 'Tienda eliminada exitosamente.');
    }
}

