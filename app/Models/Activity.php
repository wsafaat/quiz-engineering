<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory;

    public const ACTIVITY_TYPE_GUIDANCE = 'guidance';
    public const ACTIVITY_TYPE_ANNOUNCEMENT = 'event';
    public const ACTIVITY_TYPE_VACANCY = 'vacancy';
    public const ACTIVITY_TYPE_CLASS = 'class';
    public const ACTIVITY_TYPE_SESSION = 'session';

    protected $fillable = [
        'company_id',
        'activity_type',
        'activity_description',
        'activity_date',
        'company_user_role_id',
        'is_published',
        'is_active',
    ];

    public static function getRandomActivityType(): string
    {
        return [
            self::ACTIVITY_TYPE_GUIDANCE,
            self::ACTIVITY_TYPE_ANNOUNCEMENT,
            self::ACTIVITY_TYPE_VACANCY,
            self::ACTIVITY_TYPE_CLASS,
            self::ACTIVITY_TYPE_SESSION,
        ][array_rand([
            self::ACTIVITY_TYPE_GUIDANCE,
            self::ACTIVITY_TYPE_ANNOUNCEMENT,
            self::ACTIVITY_TYPE_VACANCY,
            self::ACTIVITY_TYPE_CLASS,
            self::ACTIVITY_TYPE_SESSION,
        ])];
    }
}
