<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //solicitar todas las compañias
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //retornar vista de crear compañia
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //validar datos
        $validated = $request->validate([
            'company_name' => 'required|max:200',
            'address' => 'required',
            'phone' => 'required|size:8',
            'owner' => 'required|max:100',
            'email' => 'required|email|unique:companies,email',
            'website' => 'nullable|url',
            'plan' => 'required|in:free,basic,premium',
            'deployment_type' => 'required|in:saas,on_premise',
            'status' => 'required|in:activa,suspendida,inactiva',
            'comments' => 'nullable',
        ]);

        //validar y guardar
        Company::create($validated);

        //retornar vista de compañiaes
        return redirect()->route('companies.index')->with('success', 'Compañía creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
