<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    protected $fillable = ['company_name','address','phone','owner','email','website','plan','deployment_type','status','comments'];

    //Relacion de 1 a muchos con stores
    public function stores(){
        return $this->hasMany(Store::class);
    }
    //activar soft deletes
    use SoftDeletes;

}
