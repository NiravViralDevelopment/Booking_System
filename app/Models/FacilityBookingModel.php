<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityBookingModel extends Model
{
    
    use HasFactory;
    protected $table="facility_booking";
    protected $fillable = [
        'id',
        'facility_id',
        'user_id',
        'date',
        'month_year',
        'time_slot',
        'total_hour',
        'booking_status',
        'created_at',
        'updated_at',
    ];

}
