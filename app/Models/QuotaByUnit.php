<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotaByUnit extends Model
{
    use HasFactory;
    
    protected $table="quota_by_Unit";

    protected $fillable = [
        'id',
        'facility_enrollment_quota_per_day',
        'session_enrollment_quota_per_day',
        'created_at',
        'updated_at',
    ];
}
