<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\LeaveRequest as Lvr;
use Carbon\Carbon;

trait LeaveReqTrait
{
    public function addRequestLeave($pram_insert)
    {
        $call_duration = $this->calculateDuration($pram_insert);
        $modify_params = [
            'reason'        => $pram_insert['reason'],
            'duration'      => $call_duration,
            'start_date'    => $pram_insert['start_date'],
            'end_date'      => $pram_insert['end_date'],
            'user_id'       => $pram_insert['user_id']
        ];
        $input_event = Lvr::create($modify_params);
        if ($input_event == true) {
            return response()->json([
                'status' => true,
                'respon_code' => Response::HTTP_CREATED,
                'message' => 'Data has been successfully added'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon_code' => Response::HTTP_NO_CONTENT,
                'message' => 'Data has been unsuccessfull added.!'
            ]);
        }
    }

    public function calculateDuration($pram_insert)
    {
        $start_date =   Carbon::parse($pram_insert['start_date']);
        $end_date   =   Carbon::parse($pram_insert['end_date']);

        if ($start_date == $end_date) {
            $duration = $start_date->diffInDaysFiltered(function (Carbon $date) use ($end_date) {
                return $date <= $end_date;
            });
            return $duration;
        }
        $duration = $end_date->diffInDays($start_date);
        return $duration;
    }

    public function getLeaveReqAlltoDasboardNoJson()
    {
        $get_data = DB::table('leave_requests')
            ->join('users', 'users.id', '=', 'leave_requests.user_id')
            ->select(
                'leave_requests.reason as reason',
                'users.name as req_name',
                'leave_requests.id as id_req',
                'leave_requests.start_date as sd',
                'leave_requests.end_date as ed',
                'leave_requests.status as status',
                'leave_requests.duration as duration',
                'leave_requests.user_id as request_id'
            )
            ->orderBy('leave_requests.created_at', 'desc')
            ->get();
        return $get_data;
    }

    public function getLeaveReqAlltoHistoryNoJson($sess_id)
    {
        $get_data = DB::table('leave_requests')
            ->join('users', 'users.id', '=', 'leave_requests.user_id')
            ->select(
                'leave_requests.reason as reason',
                'users.name as req_name',
                'leave_requests.id as id_req',
                'leave_requests.start_date as sd',
                'leave_requests.end_date as ed',
                'leave_requests.status as status',
                'leave_requests.duration as duration',
                'leave_requests.user_id as request_id'
            )
            ->where('leave_requests.user_id', $sess_id)
            ->orderBy('leave_requests.created_at', 'desc')
            ->get();
        return $get_data;
    }

    public function getByIdLeaveReq($id)
    {
        $get_id = Lvr::find($id);
        return response()->json($get_id);
    }

    public function updateLeaveReq($req_id, $req_all): JsonResponse
    {
        $fromid = Lvr::find($req_id);
        $call_duration = $this->calculateDuration($req_all);
        $modify_params = [
            'reason'        => $req_all['reason'],
            'duration'      => $call_duration,
            'start_date'    => $req_all['start_date'],
            'end_date'      => $req_all['end_date']
        ];
        $jalankan = $fromid->update($modify_params);
        if ($jalankan == true) {
            return response()->json([
                'status' => true,
                'respon_code' => Response::HTTP_OK,
                'message' => 'Data has been successfully modify'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon_code' => Response::HTTP_NOT_MODIFIED,
                'message' => 'Data failled modify'
            ]);
        }
    }

    public function setStatusApprove($req_id, $req_all): JsonResponse
    {
        $fromid = Lvr::find($req_id);
        $modify_params = [
            'status'           => $req_all['status'],
            'approved_by'      => $req_all['exec_id'],
            'approved_at'      => Carbon::now()->toDateTimeString()
        ];
        $jalankan = $fromid->update($modify_params);
        if ($jalankan == true) {
            return response()->json([
                'status' => true,
                'respon_code' => Response::HTTP_OK,
                'message' => 'Data has been successfully modify'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon_code' => Response::HTTP_NOT_MODIFIED,
                'message' => 'Data failled modify'
            ]);
        }
    }

    public function setStatusReject($req_id, $req_all): JsonResponse
    {
        $fromid = Lvr::find($req_id);
        $modify_params = [
            'status'           => $req_all['status']
        ];
        $jalankan = $fromid->update($modify_params);
        if ($jalankan == true) {
            return response()->json([
                'status' => true,
                'respon_code' => Response::HTTP_OK,
                'message' => 'Data has been successfully modify'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon_code' => Response::HTTP_NOT_MODIFIED,
                'message' => 'Data failled modify'
            ]);
        }
    }

    public function delLvr($id): JsonResponse
    {
        $cek_data = Lvr::select('*')->where('id', $id)->get();
        if ($cek_data->count() <= 0) {
            return response()->json([
                'respon code' => Response::HTTP_NOT_FOUND,
                'message' => 'Data not found.!'
            ]);
        } else {
            $running_hapus = Lvr::destroy($id);

            if ($running_hapus == true) {
                return response()->json([
                    'status' => 'success',
                    'respon_code' => Response::HTTP_OK,
                    'message' => 'Data has been removed successfully.!'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'respon_code' => Response::HTTP_NOT_MODIFIED,
                    'message' => 'Data has unsuccessfull removed.!'
                ]);
            }
        }
    }
}
