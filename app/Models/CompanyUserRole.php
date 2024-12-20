<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyUserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'is_active',
        'role',
    ];
}
