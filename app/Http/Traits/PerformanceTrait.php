<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\User as Us;
use App\Models\Task as Tk;

trait PerformanceTrait
{

    public function calculatePerformsIndividu()
    {
        $karyawanKPI = DB::table('users')
            ->leftJoinSub(function ($query) {
                $query->from('tasks')
                    ->selectRaw('COUNT(id) as total_assignment, user_id')
                    ->groupBy('user_id');
            }, 't1', function ($join) {
                $join->on('users.id', '=', 't1.user_id');
            })
            ->leftJoinSub(function ($query) {
                $query->from('tasks')
                    ->selectRaw('COUNT(status) as total_done, user_id')
                    ->where('status', 'Complete')
                    ->groupBy('user_id');
            }, 't2', function ($join) {
                $join->on('users.id', '=', 't2.user_id');
            })
            ->select('users.name', 't1.total_assignment', 't2.total_done', DB::raw('(t2.total_done / t1.total_assignment) * 100 AS kpi'))
            ->orderBy('kpi', 'desc')
            ->get();

        return $karyawanKPI;
    }

    public function Coba()
    {
        $jml_task = DB::table('tasks')
            ->select(DB::raw('count(id) as total_assignment, user_id'))
            ->groupBy('user_id')
            ->get();
        $jml_complete =
            DB::table('users')
            ->leftJoin('tasks', 'users.id', '=', 'tasks.user_id')
            ->select(DB::raw('count(tasks.id) as total_assignment, tasks.user_id'))
            ->where('tasks.status', '=', 'Complete')
            ->groupBy('tasks.user_id')
            ->get();
        dd($jml_task, $jml_complete);
    }

    public function Tester()
    {
        $karyawanKPI = DB::table('users')
            ->leftJoinSub(function ($query) {
                $query->from('tasks')
                    ->selectRaw('COUNT(id) as total_assignment, user_id')
                    ->groupBy('user_id');
            }, 't1', function ($join) {
                $join->on('users.id', '=', 't1.user_id');
            })
            ->leftJoinSub(function ($query) {
                $query->from('tasks')
                    ->selectRaw('COUNT(status) as total_done, user_id')
                    ->where('status', 'Complete')
                    ->groupBy('user_id');
            }, 't2', function ($join) {
                $join->on('users.id', '=', 't2.user_id');
            })
            ->select('users.name', 't1.total_assignment', 't2.total_done', DB::raw('(t2.total_done / t1.total_assignment) * 100 AS kpi'))
            ->orderBy('kpi', 'desc')
            ->get();

        return $karyawanKPI;
    }
}
