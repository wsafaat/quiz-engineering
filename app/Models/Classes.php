<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'company_id',
        'company_user_role_id',
        'class_name',
        'class_description',
        'start_time',
        'end_time',
        'location',
        'is_published',
        'is_active',
    ];
}
