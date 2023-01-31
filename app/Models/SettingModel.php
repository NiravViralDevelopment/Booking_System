<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    use HasFactory;

    protected $table="settings_data";
    protected $fillable = [
        'id',
        '_key',
        'title',
        'details',
        'image',
        'created_at',
        'updated_at',
    ];

}
