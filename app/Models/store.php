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

    public function taxInfoDelete()
    {
        return $this->hasOne(StoreTaxInfo::class);
    }

    //relacion con usuarios de uno a muchos
    public function users(){
        return $this->hasMany(User::class);
    }

    
        //eliminacion en cascada de la informacion fiscal al eliminar un establecimiento    
    protected static function booted(){
        static::deleting(function($store){
            if ($store->taxInfoDelete) {
                $store->taxInfoDelete->delete();
            }
            
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
    public function taxInfo()
    {
        return $this->hasOne(StoreTaxInfo::class);
    }
    
}
