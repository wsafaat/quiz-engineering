<?php

namespace App\Http\Services;

use App\Models\Activity;
use App\Models\Classes;
use App\Models\Event;
use App\Models\Guidance;
use App\Models\Lesson;
use App\Models\Vacancy;

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
    public static function getActivities($request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $columnSelect = [
            'id',
            'company_id',
            'company_user_role_id',
            'name as activity_name',
            'description as activity_description',
            'start_time',
            'end_time',
            'location',
            'is_published',
            'is_active',
            'created_at',
            'updated_at',
        ];

        $events = Event::select($columnSelect)->get()->toArray();
        $guidances = Guidance::select($columnSelect)->get()->toArray();
        $classes = Classes::select($columnSelect)->get()->toArray();
        $vacancies = Vacancy::select($columnSelect)->get()->toArray();
        $sessions = Lesson::select($columnSelect)->get()->toArray();

        $events = array_map(function ($event) {
            $event['activity_type'] = Activity::ACTIVITY_TYPE_ANNOUNCEMENT;
            return $event;
        }, $events);

        $guidances = array_map(function ($guidance) {
            $guidance['activity_type'] = Activity::ACTIVITY_TYPE_GUIDANCE;
            return $guidance;
        }, $guidances);

        $classes = array_map(function ($class) {
            $class['activity_type'] = Activity::ACTIVITY_TYPE_CLASS;
            return $class;
        }, $classes);

        $vacancies = array_map(function ($vacancy) {
            $vacancy['activity_type'] = Activity::ACTIVITY_TYPE_VACANCY;
            return $vacancy;
        }, $vacancies);

        $sessions = array_map(function ($session) {
            $session['activity_type'] = Activity::ACTIVITY_TYPE_SESSION;
            return $session;
        }, $sessions);

        $activities = array_merge($events, $guidances, $classes, $vacancies, $sessions);

        return new \Illuminate\Pagination\LengthAwarePaginator(
            array_slice($activities, ($perPage ?? 10) * (request('page', 1) - 1), $perPage ?? 10),
            count($activities),
            $perPage ?? 10,
            request('page', $request->query('page', 1)),
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );
    }

    public static function getActivity(int $id): Activity
    {
        return Activity::findOrFail($id);
    }
}
