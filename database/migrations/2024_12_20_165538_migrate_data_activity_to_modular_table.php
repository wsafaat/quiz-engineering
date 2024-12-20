<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Activity;

class MigrateDataActivityToModularTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::beginTransaction();

        try {
            $activities = Activity::all();
            $insert_to_events = [];
            $insert_to_guidance = [];
            $insert_to_classes = [];
            $insert_to_vacancy = [];
            $insert_to_session = [];

            foreach ($activities as $activity) {
                $insertData = [
                    'company_id' => $activity->company_id,
                    'company_user_role_id' => $activity->company_user_role_id,
                    'start_time' => $activity->start_time,
                    'end_time' => $activity->end_time,
                    'location' => $activity->location,
                    'is_published' => $activity->is_published,
                    'is_active' => $activity->is_active,
                ];

                switch ($activity->activity_type) {
                    case Activity::ACTIVITY_TYPE_ANNOUNCEMENT:
                        $insertData['name'] = $activity->activity_name;
                        $insertData['description'] = $activity->activity_description;
                        $insert_to_events[] = $insertData;
                        break;
                    case Activity::ACTIVITY_TYPE_GUIDANCE:
                        $insertData['name'] = $activity->activity_name;
                        $insertData['description'] = $activity->activity_description;
                        $insert_to_guidance[] = $insertData;
                        break;
                    case Activity::ACTIVITY_TYPE_CLASS:
                        $insertData['name'] = $activity->activity_name;
                        $insertData['description'] = $activity->activity_description;
                        $insert_to_classes[] = $insertData;
                        break;
                    case Activity::ACTIVITY_TYPE_VACANCY:
                        $insertData['name'] = $activity->activity_name;
                        $insertData['description'] = $activity->activity_description;
                        $insert_to_vacancy[] = $insertData;
                        break;
                    case Activity::ACTIVITY_TYPE_SESSION:
                        $insertData['name'] = $activity->activity_name;
                        $insertData['description'] = $activity->activity_description;
                        $insert_to_session[] = $insertData;
                        break;
                }
            }

            if (!empty($insert_to_events)) {
                DB::table('events')->insert($insert_to_events);
            }
            if (!empty($insert_to_guidance)) {
                DB::table('guidances')->insert($insert_to_guidance);
            }
            if (!empty($insert_to_classes)) {
                DB::table('classes')->insert($insert_to_classes);
            }
            if (!empty($insert_to_vacancy)) {
                DB::table('vacancies')->insert($insert_to_vacancy);
            }
            if (!empty($insert_to_session)) {
                DB::table('lessons')->insert($insert_to_session);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('events')->update(['is_active' => false]);
        DB::table('guidance')->update(['is_active' => false]);
        DB::table('classes')->update(['is_active' => false]);
        DB::table('vacancy')->update(['is_active' => false]);
        DB::table('session')->update(['is_active' => false]);
    }
}

