<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TowerModel;
use Spatie\Translatable\HasTranslations;


class Floar extends Model
{
    use HasFactory;
    // use HasTranslations;
    protected $fillable = [
        'tower_id',
        'floar_name',
    ];
    
    // public function Tower_details(){    
    //     return $this->hasOne(TowerModel::class,'tower_id');
    // }

    // protected $translatable = [
    //     'floar_name'
    // ];


   
}
