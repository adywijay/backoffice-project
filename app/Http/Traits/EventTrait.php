<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Event as Ev;

trait EventTrait
{
    public function getEventV1(): JsonResponse
    {
        $get_data = Ev::all();
        return response()->json($get_data);
    }

    public function getEventNoJson()
    {
        $call_data = Ev::all();
        return $call_data;
    }

    public function getByIdEvent($id)
    {
        $get_id = Ev::find($id);
        return response()->json($get_id);
    }


    public function addEvent($pram_insert): JsonResponse
    {
        $input_event = Ev::create($pram_insert);
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

    public function updateEvent($req_id, $req_all): JsonResponse
    {
        $fromid = Ev::find($req_id);
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
                'respon_code' => Response::HTTP_NOT_MODIFIED,
                'message' => 'Data failled modify'
            ]);
        }
    }

    public function delEvent($id): JsonResponse
    {
        $cek_data = Ev::select('*')->where('id', $id)->get();
        if ($cek_data->count() <= 0) {
            return response()->json([
                'respon code' => Response::HTTP_NOT_FOUND,
                'message' => 'Data not found.!'
            ]);
        } else {
            $running_hapus = Ev::destroy($id);

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
