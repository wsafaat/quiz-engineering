<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_phone',
        'company_address',
        'company_website',
        'company_logo',
    ];
}
