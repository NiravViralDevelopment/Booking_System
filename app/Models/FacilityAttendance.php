<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityAttendance extends Model
{
    use HasFactory;

    protected $table="facility_attendance";
    protected $fillable = [
        'id',
        'facility_booking_id',
        'facility_id',
        'user_id',
        'date',
        'month_year',
        'time_slot',
        'attendance_status',
        'created_at',
        'updated_at',
    ];
}
