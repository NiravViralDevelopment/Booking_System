<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FacilityManagment;

class FacilityModel extends Model
{
    use HasFactory;
    protected $table="facility";
    protected $fillable = [
        'id',
        'title',
        'content',
        'remarks',
        'quota_per_facility',
        'quota_per_session',
        'status',
        'created_at',
        'updated_at',
    ];

    public  function FacilityManagment(){    
        return $this->hasMany(FacilityManagment::class,'facity_id','id');
    }
    

}
