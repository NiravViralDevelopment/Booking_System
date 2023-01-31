<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class TowerModel extends Model
{
    use HasFactory;
    // use HasTranslations;

    protected $table="towers";

    protected $fillable = [
        'tower_name',
    ];

    // protected $translatable = [
    //     'tower_name'
    // ];
   
    
}
