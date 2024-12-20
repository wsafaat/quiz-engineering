<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';

    protected $fillable = [
        'company_id',
        'company_user_role_id',
        'vacancy_name',
        'vacancy_description',
        'start_time',
        'end_time',
        'location',
        'is_published',
        'is_active',
    ];
}
