<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    //Los campos que pueden ser asignados masivamente
    protected $fillable = [
        'company_id',
        'store_name',
        'address',
        'phone',
        'manager',
        'email',
        'status',
        'comments',
    ];


    //Relacion inversa de muchos a 1 con Company
    public function company(){
        return $this->belongsTo(Company::class);
    }

    //Uso de SoftDeletes
    use SoftDeletes;

    public function taxInfoDelete()
    {
        return $this->hasOne(StoreTaxInfo::class);
    }

    protected static function booted(){
        static::deleting(function($store){
            if ($store->taxInfoDelete) {
                $store->taxInfoDelete->delete();
            }
            
        });
    }


}
