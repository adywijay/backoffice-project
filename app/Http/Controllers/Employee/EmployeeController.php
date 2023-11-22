<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Traits\EventTrait;
use App\Http\Traits\LeaveReqTrait;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\TaskTrait;
use App\Http\Traits\UserTrait;
use App\Http\Traits\MappingTaskTrait;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function Logic from call All Traits                          |
     *                                                                               |
     * ==============================================================================+
     */
    use TaskTrait;
    use UserTrait;
    use MappingTaskTrait;
    use EventTrait;
    use LeaveReqTrait;

    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function Logic from call All Construct                       |
     *                                                                               |
     * ==============================================================================+
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_employe');
    }
    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function Logic from call All views                           |
     *                                                                               |
     * ==============================================================================+
     */

    public function index()
    {
        $d1 = $this->getByMondaySingleId(Auth::user()->id);
        $d2 = $this->getByTuesdaySingleId(Auth::user()->id);
        $d3 = $this->getByWednesdaySingleId(Auth::user()->id);
        $d4 = $this->getByThursdaySingleId(Auth::user()->id);
        $d5 = $this->getByFridaySingleId(Auth::user()->id);
        $d6 = $this->getBySaturdaySingleId(Auth::user()->id);

        return view('employe.content.body_content.welcome', [
            "judul" => "Dashboard | Employment"
        ], compact('d1', 'd2', 'd3', 'd4', 'd5', 'd6'));
    }

    public function getListTask()
    {

        $get = $this->getPerIdLogin(Auth::user()->id);
        return view('employe.content.body_content.load-list-task', [
            "judul" => "Employment :: Assignment Page"
        ], compact('get'));
    }

    public function getMyEvent()
    {
        return view('employe.content.body_content.load-my-event', [
            "judul" => "Employment :: Event"
        ]);
    }

    public function getMyLeaveReq()
    {
        $history = $this->getLeaveReqAlltoHistoryNoJson(Auth::user()->id);
        return view('employe.content.body_content.load-my-lvr', [
            "judul" => "Employment :: Leave Request"
        ], compact('history'));
    }


    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function call bussiness Logic Action Create  { C }           |
     *                                                                               |
     * ==============================================================================+
     */

    public function addReqLeave(Request $req)
    {
        $this->validate($req, [
            'reason'        => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
            'user_id'       => 'required'
        ]);
        $pram_insert = [
            'reason'        => $req->reason,
            'start_date'    => $req->start_date,
            'end_date'      => $req->end_date,
            'user_id'       => $req->user_id
        ];
        return $this->addRequestLeave($pram_insert);
    }


    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function call bussiness Logic Action Read or Retrive  { R }  |
     *                                                                               |
     * ==============================================================================+
     */

    public function getTaskBy($id)
    {
        return $this->getPerIdLogin($id);
    }

    public function getsByIdTask($id)
    {
        return $this->getByIdTask($id);
    }

    public function getListNameOption()
    {
        return $this->getListName();
    }
    public function getEventAll()
    {
        return $this->getEventV1();
    }

    public function getByLeaveReq($id)
    {
        return $this->getByIdLeaveReq($id);
    }


    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function call bussiness Logic Action Update  { U }           |
     *                                                                               |
     * ==============================================================================+
     */
    public function actionUpdateTask(Request $req)
    {
        $get_id = $req->id;
        $get_all = $req->all();
        return $this->updateTask($get_id, $get_all);
    }

    public function actionUpdateLeaveRequest(Request $req)
    {
        $get_id = $req->id;
        $get_all = $req->all();
        return $this->updateLeaveReq($get_id, $get_all);
    }


    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function call bussiness Logic Action Delete  { D }           |
     *                                                                               |
     * ==============================================================================+
     */



    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function call Another bussiness Logic                        |
     *                                                                               |
     * ==============================================================================+
     */
}
