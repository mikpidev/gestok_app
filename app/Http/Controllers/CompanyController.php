<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Company;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    
    public function index()
    {   
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->hasRole('superadmin')) {
            $companies = Company::all();
        } elseif ($user->hasRole('admin')) {
            $companyId = session('selected_company_id');
            if (!$companyId) abort(403, 'Se requiere compañía.');
            $companies = Company::where('id', $companyId)->get();
        } else {
            abort(403, 'Acceso no autorizado.');
        }
        //retorna lista de tiendas
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {   
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

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
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        session(['selected_company_id' => $company->id]);

        return redirect()->route('stores.index');
    }

    public function edit(Company $company)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('company.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {   
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

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
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Compañía eliminada exitosamente.');
    }


}