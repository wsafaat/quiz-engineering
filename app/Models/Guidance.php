<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guidance extends Model
{
    protected $table = 'guidances';

    protected $fillable = [
        'company_id',
        'company_user_role_id',
        'guidance_name',
        'guidance_description',
        'start_time',
        'end_time',
        'location',
        'is_published',
        'is_active',
    ];
}
