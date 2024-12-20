<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'events';

    protected $fillable = [
        'company_id',
        'company_user_role_id',
        'event_name',
        'event_description',
        'start_time',
        'end_time',
        'location',
        'is_published',
        'is_active',
    ];
}
