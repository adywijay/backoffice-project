<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User as Us;



trait UserTrait
{
    public function getUserAll()
    {
        $get_data = Us::all();
        return $get_data;
    }

    protected function gearerPasRest()
    {
        $passlength = 10;
        $alphabet = '5eV3nP1OnabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLPTMNOPQRSTUVWXYZSEMESTArUAngInOVas10123456789';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < $passlength; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }

    protected function genStandartPassw()
    {
        $clue = Carbon::now()->toDateTimeString();
        $adder = "5eV3nP1On";
        $generate_pass = "/?<>@#$%&*!=()-_~`^{$clue}{$adder}ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $out_generate = substr(str_shuffle($generate_pass), 0, 10);
        return $out_generate;
    }

    public function getOnlyIdUsr($param_id)
    {
        $cek_data = Us::select('id', 'name', 'email', 'role', 'email_verified_at')->where('id', $param_id)->first();
        return $cek_data;
    }

    public function getBy($param_id)
    {
        $cek_data = Us::select('id', 'name', 'email', 'role', 'email_verified_at')->where('id', $param_id)->first();
        return response()->json($cek_data);
    }

    public function getListName()
    {
        $run_query = Us::select('id', 'name')
            ->orderBy('id', 'asc')
            ->get();
        return response()->json($run_query);
    }

    public function sortByRole()
    {
        $run_query = Us::select('id', 'name')
            ->where('role', 'employe')
            ->orderBy('id', 'asc')
            ->get();
        return $run_query;
    }

    public function resetPassManual($req_all): JsonResponse
    {
        $fromid = Us::find($req_all['id']);
        $jalankan = $fromid->update($req_all);
        if ($jalankan == true) {
            return response()->json([
                'status' => true,
                'respon_code' => Response::HTTP_OK,
                'message' => 'Password has been successfully reset'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'respon_code' => Response::HTTP_NOT_MODIFIED,
                'message' => 'Password failled modify'
            ]);
        }
    }

    public function addUserReg($pram_insert): JsonResponse
    {
        $input_user = Us::create($pram_insert);
        if ($input_user == true) {
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

    public function updateUsers($req_id, $req_all): JsonResponse
    {
        $fromid = Us::find($req_id);
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

    public function delUser($id): JsonResponse
    {
        $cek_data = Us::select('*')->where('id', $id)->get();
        if ($cek_data->count() <= 0) {
            return response()->json([
                'respon_code' => Response::HTTP_NOT_FOUND,
                'message' => 'Data not found.!'
            ]);
        } else {
            $running_hapus = Us::destroy($id);

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

    public function echeckExixstEmail($email_input)
    {
        $user = Us::where('email', $email_input)->first();
        if ($user) {
            return response()->json(['status' => 'email address already exists.!']);
        } else {
            return response()->json(['status' => '']);
        }
    }
}
