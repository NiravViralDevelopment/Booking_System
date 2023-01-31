<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAccount extends Model
{
    use HasFactory;
    protected $table="sub_account";
    protected $fillable = [
        'id',
        'master_account_id',
        'chinese_name',
        'english_name',
        'unit_id',
        'sub_text',
        'sub_email',
        'remarks',
        'sub_country_code',
        'sub_status',
        'created_at',
        'updated_at',
    ];
}
