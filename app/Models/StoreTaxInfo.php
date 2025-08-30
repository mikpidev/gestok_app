<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreTaxInfo extends Model
{
    //campos que se de pueden asignar de forma masiva
    protected $fillable = [
        'company_id',
        'store_id',
        'nit',
        'ncr',
        'razon_social',
        'actividad_economica',
        'direccion_fiscal',
        'email',
        'telefono',
        'cert_firma_digital',
        'estado',
        'comentarios',
    ];
    
    //relacion con la compania de uno a muchos (inversa);
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    
    
}

