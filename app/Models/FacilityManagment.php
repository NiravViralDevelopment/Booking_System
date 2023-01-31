<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityManagment extends Model
{
    use HasFactory;
    protected $table="facility_managment";
    protected $fillable = [
        'id',
        'facity_id',
        'hour_first',
        'minutes_first',
        'hour_third',
        'minutes_four',
        '_key',
        'total_hour',
        'created_at',
        'updated_at',
    ];
}
