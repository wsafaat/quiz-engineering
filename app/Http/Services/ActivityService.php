<?php

namespace App\Http\Services;

use App\Models\Activity;

class ActivityService
{
    /**
     * Retrieve paginated activities.
     *
     * @param int $perPage
     *     Amount of activities per page.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *     LengthAwarePaginator containing paginated activities.
     */
    public static function getActivities(int $perPage = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Activity::paginate($perPage);
    }

    public static function getActivity(int $id): Activity
    {
        return Activity::findOrFail($id);
    }
}
