<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $fillable = [
        'company_id',
        'company_user_role_id',
        'lesson_name',
        'lesson_description',
        'start_time',
        'end_time',
        'location',
        'is_published',
        'is_active',
    ];
}
