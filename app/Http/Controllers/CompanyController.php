<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Company;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        //retorna lista de tiendas

        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
            'company_name' => 'required|max:200',
            'address' => 'required',
            'phone' => 'required|size:8',
            'owner' => 'required|max:100',
            'email' => 'email|max:100|unique:companies,email',            
            'website' => 'nullable|url',
            'plan' => 'required|in:free,basic,premium',
            'deployment_type' => 'required|in:saas,on_premise',
            'status' => 'required|in:activa,suspendida,inactiva',
            'comments' => 'nullable',
        ]);

        $company = Company::create($validated);

        return redirect()->route('stores.create', ['company' => $company->id])
                         ->with('success', 'Compañía creada, ahora crea su primera tienda.');

    }

    public function show(Company $company)
    {
        
        return view('company.show', compact('company'));
    }

    public function edit(Company $company)
    {

        return view('company.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'company_name' => 'required|max:200',
            'address' => 'required',
            'phone' => 'required|size:8',
            'owner' => 'required|max:100',
            'email' => ['email', Rule::unique('companies')->ignore($company->id)->whereNull('deleted_at'),],  // Solo verifica registros activos         
            'website' => 'nullable|url',
            'plan' => 'required|in:free,basic,premium',
            'deployment_type' => 'required|in:saas,on_premise',
            'status' => 'required|in:activa,suspendida,inactiva',
            'comments' => 'nullable',
        ]);

        $company->update($validated);

        return redirect()->route('companies.index')->with('success', 'Compañía actualizada exitosamente.');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Compañía eliminada exitosamente.');
    }
}