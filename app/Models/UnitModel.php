<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitModel extends Model
{
    use HasFactory;
    protected $table="units";

    protected $fillable = [
        'id',
        'tower_id',
        'floar_id',
        'unit_name',
        'created_at',
        'updated_at',
    ];
}
