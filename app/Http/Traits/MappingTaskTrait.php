<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Task as Tk;

trait MappingTaskTrait
{
    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function call filtering day name alls                        |
     *                                                                               |
     * ==============================================================================+
     */
    public function getByMonday()
    {
        $day_number1 = 'Monday';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ?',
            [$day_number1]
        );
        return $data;
    }

    public function getByTuesday()
    {
        $day_number2 = 'Tuesday';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ?',
            [$day_number2]
        );
        return $data;
    }

    public function getByWednesday()
    {
        $day_number3 = 'Wednesday';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ?',
            [$day_number3]
        );
        return $data;
    }

    public function getByThursday()
    {
        $day_number4 = 'Thursday';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ?',
            [$day_number4]
        );
        return $data;
    }

    public function getByFriday()
    {
        $day_number5 = 'Friday';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ?',
            [$day_number5]
        );
        return $data;
    }

    public function getBySaturday()
    {
        $day_number6 = 'Saturday';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ?',
            [$day_number6]
        );
        return $data;
    }

    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function call filtering day name by session ID               |
     *                                                                               |
     * ==============================================================================+
     */
    public function getByMondaySingleId($sess_id)
    {
        $day_number1 = 'Monday';
        $filter_status = 'Complete';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ? and tks.user_id = ? and tks.status != ?',
            [$day_number1, $sess_id, $filter_status]
        );
        return $data;
    }

    public function getByTuesdaySingleId($sess_id)
    {
        $day_number2 = 'Tuesday';
        $filter_status = 'Complete';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ? and tks.user_id = ? and tks.status != ?',
            [$day_number2, $sess_id, $filter_status]
        );
        return $data;
    }

    public function getByWednesdaySingleId($sess_id)
    {
        $day_number3 = 'Wednesday';
        $filter_status = 'Complete';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ? and tks.user_id = ? and tks.status != ?',
            [$day_number3, $sess_id, $filter_status]
        );
        return $data;
    }

    public function getByThursdaySingleId($sess_id)
    {
        $day_number4 = 'Thursday';
        $filter_status = 'Complete';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ? and tks.user_id = ? and tks.status != ?',
            [$day_number4, $sess_id, $filter_status]
        );
        return $data;
    }

    public function getByFridaySingleId($sess_id)
    {
        $day_number5 = 'Friday';
        $filter_status = 'Complete';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ? and tks.user_id = ? and tks.status != ?',
            [$day_number5, $sess_id, $filter_status]
        );
        return $data;
    }

    public function getBySaturdaySingleId($sess_id)
    {
        $day_number6 = 'Saturday';
        $filter_status = 'Complete';
        $data = DB::select(
            'select
                us.name as user_name,
                tks.id as id_task,
                tks.name as project_name,
                tks.category as category,
                tks.start_date as sd,
                tks.end_date as ed,
                tks.link as ulink,
                tks.status as status,
                tks.user_id as person_id_taking
                from tasks tks
                join users us on us.id = tks.user_id
                where DAYNAME(tks.start_date) = ? and tks.user_id = ?',
            [$day_number6, $sess_id, $filter_status]
        );
        return $data;
    }
}
