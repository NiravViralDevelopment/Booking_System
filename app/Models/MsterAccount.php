<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubAccount;

class MsterAccount extends Model
{
    use HasFactory;
    protected $table="master_account";
    protected $fillable = [
        'id',
        'tower_id',
        'floor_id',
        'chinese_name',
        'english_name',
        'unit_id',
        'text',
        'email',
        'remarks',
        'status',
        'country_code',
        'created_at',
        'updated_at',
    ];

    
    public  function subaccount(){    
        return $this->hasMany(SubAccount::class,'master_account_id','id');
    }

}
