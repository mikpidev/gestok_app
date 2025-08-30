<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\StoreTaxInfo;
use Illuminate\Http\Request;

class StoreTaxInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //La vista no sera necesaria ya que se mostrara en el perfil de la tienda
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Store $store)
    {
        //crear vista para agregar informacion fiscal y que ya tenga la compañia a la que pertenece
        $company = $store->company; // obtener la compañía asociada

        return view('stores_tax_info.create', compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Store $store)
    {
        $validated = $request->validate([
            'nit' => 'required|max:20|unique:store_tax_infos,nit',
            'ncr' => 'required|max:20|unique:store_tax_infos,ncr',
            'razon_social' => 'required|max:200',
            'actividad_economica' => 'required|max:200',
            'direccion_fiscal' => 'required|max:200',
            'email' => 'required|email|max:100',
            'telefono' => 'required|max:8',
            'cert_firma_digital' => 'required|max:200',
            'estado' => 'required|in:activo,suspendido,vencido',
            'comentarios' => 'nullable|max:500',
        ]);
    
        // asignar company_id manualmente
        $validated['company_id'] = $store->company_id;
    
        // crear info fiscal
        $storeTaxInfo = $store->taxInfo()->create($validated);
    
        return redirect()->route('stores.show', $store->id)
                         ->with('success', 'Información fiscal registrada correctamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(StoreTaxInfo $storeTaxInfo , $id)
    {   
        $storeTaxInfo = StoreTaxInfo::find($id);


        
        $storeTaxInfo->load('store.company'); // carga tienda y compañía en la misma llamada
        $store = $storeTaxInfo->store;
        return view('stores_tax_info.show', compact('store', 'storeTaxInfo'));
        
        // Depuración
        dd($storeTaxInfo->toArray());
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoreTaxInfo $storeTaxInfo)
    {
        //editar informacion fiscal
        $company = $storeTaxInfo->company; // relación belongsTo
        $store   = $storeTaxInfo->store;   // relación belongsTo

        return view('storeTaxInfo.edit', compact('company', 'store', 'storeTaxInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StoreTaxInfo $storeTaxInfo)
    {
        //actualizar informacion fiscal
        $validated = $request->validate([
            'nit' => 'required|max:20|unique:store_tax_infos,nit,' . $storeTaxInfo->id,
            'ncr' => 'required|max:20|unique:store_tax_infos,ncr,' . $storeTaxInfo->id,
            'razon_social' => 'required|max:200',
            'actividad_economica' => 'required|max:200',
            'direccion_fiscal' => 'required|max:200',
            'establecimiento' => 'required|max:100',
            'email' => 'required|email|max:100',
            'telefono' => 'required|max:8',
            'cert_firma_digital' => 'required|max:200',
            'estado' => 'required|in:activo,suspendido,vencido',
            'comentarios' => 'nullable|max:500'
        ]); 
        $storeTaxInfo->update($validated);
        return redirect()->route('stores.show', $storeTaxInfo->store_id)->with('success', 'Informacion fiscal actualizada correctamente');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoreTaxInfo $storeTaxInfo)
    {
        //soft delete informacion fiscal
        $storeTaxInfo->delete();
        return redirect()->route('stores.show', $storeTaxInfo->store_id)->with('success', 'Informacion fiscal eliminada correctamente');
    }
}
