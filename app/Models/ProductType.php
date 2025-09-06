<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductType extends Model
{
    //datos que son obligatorios
    protected $fillable = [
        'name',
        'price',
        'stock',
        'category',
        'description',
        'company_id',
        'store_id',
    ];

    //Uso de SoftDeletes
    use SoftDeletes;

    //relacion con la compañia
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    //relacion con la tienda
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
