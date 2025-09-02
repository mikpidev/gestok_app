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



    //Uso de SoftDeletes
    use SoftDeletes;
    //relacion para eliminacion en cascada de la informacion fiscal
    public function taxInfoDelete()
    {
        return $this->hasOne(StoreTaxInfo::class);
    }



    
        //eliminacion en cascada de la informacion fiscal al eliminar un establecimiento    
    protected static function booted(){
        static::deleting(function($store){
            if ($store->taxInfoDelete) {
                $store->taxInfoDelete->delete();
            }
            
        });
    }

    //relacion con la compañia
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
    //relacion con la informacion fiscal
    public function taxInfo()
    {
        return $this->hasOne(StoreTaxInfo::class);
    }

    //relacion usuarios
    public function users()
    {
        return $this->hasMany(User::class);
    }

    
}
