<?php

namespace App\Http\Traits\AdminTraits;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Task as Tk;



trait TaskTrait
{
    public function getTaskAll()
    {
        $get_data = Tk::all();
        return $get_data;
    }



    public function getTaskV1(): JsonResponse
    {
        $get_data = Tk::all();
        if ($get_data == true) {
            return response()->json([
                'status' => true,
                'respon_code' => Response::HTTP_OK,
                'data' => $get_data
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon_code' => Response::HTTP_NO_CONTENT,
                'message' => 'Data has been unsuccessfull added.!'
            ]);
        }
    }

    public function getTaskV2(): JsonResponse
    {
        $get_data = Tk::all();
        return response()->json($get_data);
    }

    public function addTask($pram_insert): JsonResponse
    {
        $input_task = Tk::create($pram_insert);
        if ($input_task == true) {
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

    public function getByIdTask($id): JsonResponse
    {
        $get_id = Tk::find($id);
        return response()->json($get_id);
    }

    public function getByInprogressNoJson()
    {

        $data = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->select(
                'users.name as user_name',
                'tasks.id as id_task',
                'tasks.name as project_name',
                'tasks.category as category',
                'tasks.start_date as sd',
                'tasks.end_date as ed',
                'tasks.link as ulink',
                'tasks.status as status',
                'tasks.user_id as person_id_taking'
            )
            ->where('tasks.status', '=', 'Inprogress')
            ->get();
        return $data;
    }

    public function getByToDoNoJson()
    {

        $data = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->select(
                'users.name as user_name',
                'tasks.id as id_task',
                'tasks.name as project_name',
                'tasks.category as category',
                'tasks.start_date as sd',
                'tasks.end_date as ed',
                'tasks.link as ulink',
                'tasks.status as status',
                'tasks.user_id as person_id_taking'
            )
            ->where('tasks.status', '=', 'To-Do')
            ->get();
        return $data;
    }

    public function getByReviewNoJson()
    {

        $data = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->select(
                'users.name as user_name',
                'tasks.id as id_task',
                'tasks.name as project_name',
                'tasks.category as category',
                'tasks.start_date as sd',
                'tasks.end_date as ed',
                'tasks.link as ulink',
                'tasks.status as status',
                'tasks.user_id as person_id_taking'
            )
            ->where('tasks.status', '=', 'Review')
            ->get();
        return $data;
    }

    public function getByCompleteNoJson()
    {

        $data = DB::table('tasks')
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->select(
                'users.name as user_name',
                'tasks.id as id_task',
                'tasks.name as project_name',
                'tasks.category as category',
                'tasks.start_date as sd',
                'tasks.end_date as ed',
                'tasks.link as ulink',
                'tasks.status as status',
                'tasks.user_id as person_id_taking'
            )
            ->where('tasks.status', '=', 'Complete')
            ->get();
        return $data;
    }

    public function updateTask($req_id, $req_all): JsonResponse
    {
        $fromid = Tk::find($req_id);
        $inputan = $req_all;
        $jalankan = $fromid->update($inputan);
        if ($jalankan == true) {
            return response()->json([
                'status' => true,
                'respon_code' => Response::HTTP_OK,
                'message' => 'Data has been successfully modify'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon code' => Response::HTTP_NOT_MODIFIED,
                'message' => 'Data failled modify'
            ]);
        }
    }

    public function delTask($id): JsonResponse
    {
        $cek_data = Tk::select('*')->where('id', $id)->get();
        if ($cek_data->count() <= 0) {
            return response()->json([
                'respon code' => Response::HTTP_NOT_FOUND,
                'message' => 'Data not found.!'
            ]);
        } else {
            $running_hapus = Tk::destroy($id);

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
