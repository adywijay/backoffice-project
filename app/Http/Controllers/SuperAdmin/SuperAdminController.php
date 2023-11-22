<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Traits\TaskTrait;
use App\Http\Controllers\Controller;
use App\Http\Traits\EventTrait;
use App\Http\Traits\LeaveReqTrait;
use App\Http\Traits\UserTrait;
use App\Http\Traits\MappingTaskTrait;
use App\Http\Traits\PerformanceTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
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
    use PerformanceTrait;
    use EventTrait;
    use LeaveReqTrait;

    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function Logic from call Construct                           |
     *                                                                               |
     * ==============================================================================+
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is_root');
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
        $d1 = $this->getByMonday();
        $d2 = $this->getByTuesday();
        $d3 = $this->getByWednesday();
        $d4 = $this->getByThursday();
        $d5 = $this->getByFriday();
        $d6 = $this->getBySaturday();
        $count_all = $this->countAllTask();
        $count_complete = $this->countAllTaskComplete();
        $data = $this->calculatePerformsIndividu();
        return view('super-admin.content.body_content.welcome', [
            "judul" => "Dashboard | Super Admin"
        ], compact('d1', 'd2', 'd3', 'd4', 'd5', 'd6', 'count_all', 'count_complete', 'data'));
    }

    public function getUser()
    {
        $now = Carbon::now();
        $get = $this->getUserAll();
        $get_key = $this->genStandartPassw();
        $init = $this->gearerPasRest();
        return view('super-admin.content.body_content.load-list-user', [
            "judul" => "Super-Admin | User Registrations"
        ], compact('get', 'get_key', 'now', 'init'));
    }

    public function mappingTask()
    {
        $call_inprogress = $this->getByInprogressNoJson();
        $call_todo       = $this->getByToDoNoJson();
        $call_review     = $this->getByReviewNoJson();
        $call_done       = $this->getByCompleteNoJson();
        return view('super-admin.content.body_content.assignment_view', [
            "judul" => "Super-Admin :: Assignment Page"
        ], compact('call_inprogress', 'call_todo', 'call_review', 'call_done'));
    }

    public function getListTask()
    {
        $get = $this->getByStatusAll();
        return view('super-admin.content.body_content.load-list-task', [
            "judul" => "Super-Admin :: Assignment Page"
        ], compact('get'));
    }

    public function usrID($id)
    {
        $data = $this->getOnlyIdUsr($id);
        return view('super-admin.content.body_content.load-edit-user', [
            "judul" => "View | User-Details"
        ], compact('data'));
    }

    public function getPerform()
    {
        $count_all = $this->countAllTask();
        $count_complete = $this->countAllTaskComplete();
        $data = $this->calculatePerformsIndividu();
        return view('super-admin.content.body_content.load-view-performance', [
            "judul" => "View | Perform"
        ], compact('count_all', 'count_complete', 'data'));
    }

    public function eventOfficer()
    {
        return view('super-admin.content.body_content.load-event-officer', [
            "judul" => "Event | Officer"
        ]);
    }

    public function managementEvent()
    {
        $data = $this->getEventNoJson();
        return view('super-admin.content.body_content.load-event-management', [
            "judul" => "Event | Management"
        ], compact('data'));
    }

    public function managementLeaveReq()
    {
        $data = $this->getLeaveReqAlltoDasboardNoJson();
        return view('super-admin.content.body_content.load-leaved-management', [
            "judul" => "Event | Management"
        ], compact('data'));
    }



    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function call bussiness Logic Action Create  { C }           |
     *                                                                               |
     * ==============================================================================+
     */
    public function addUserRegistration(Request $req)
    {

        $this->validate($req, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $pram_insert = [
            'name'                  => $req->name,
            'email'                 => $req->email,
            'password'              => Hash::make($req->password),
            'role'                  => $req->role,
            'email_verified_at'     => $req->email_verified_at
        ];
        return $this->addUserReg($pram_insert);
    }

    public function insertTask(Request $req)
    {

        $this->validate($req, [
            'name'       => 'required',
            'category'   => 'required',
            'start_date' => 'required',
            'end_date'   => 'required',
            'link'       => 'required',
            'status'     => 'required',
            'user_id'    => 'required'
        ]);
        $pram_insert = [
            'name'       => $req->name,
            'category'   => $req->category,
            'start_date' => $req->start_date,
            'end_date'   => $req->end_date,
            'link'       => $req->link,
            'status'     => $req->status,
            'user_id'    => $req->user_id,
            'author_id'  => $req->author_id
        ];
        return $this->addTask($pram_insert);
    }

    public function insertEvent(Request $req)
    {

        $this->validate($req, [
            'title'                      => 'required',
            'start_date'                 => 'required',
            'end_date'                   => 'required',
            'description'                => 'required',
            'type'                       => 'required'
        ]);
        $pram_insert = [
            'title'                  => $req->title,
            'start_date'             => $req->start_date,
            'end_date'               => $req->end_date,
            'description'            => $req->description,
            'type'                   => $req->type,
            'color'                  => $req->color
        ];

        return $this->addEvent($pram_insert);
    }

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


    public function retriveAllTask()
    {
        return $this->getTaskV2();
    }

    public function getsByIdTask($id)
    {
        return $this->getByIdTask($id);
    }

    public function getListNameOption()
    {
        return $this->getListName();
    }

    public function getBeforeUpdate($id)
    {
        return $this->getBy($id);
    }

    public function existEmails(Request $req)
    {
        return $this->echeckExixstEmail($req->email);
    }

    public function getEventAll()
    {
        return $this->getEventV1();
    }

    public function getByEventId($id)
    {
        return $this->getByIdEvent($id);
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
    public function resManPassw(Request $req)
    {
        $inputan = [
            'id' => $req->id,
            'name' => $req->name,
            'password' => Hash::make($req['password'])
        ];
        return $this->resetPassManual($inputan);
    }

    public function actionsUpdateUser(Request $req)
    {
        $get_id = $req->id;
        $get_all = $req->all();
        return $this->updateUsers($get_id, $get_all);
    }

    public function actionUpdateTask(Request $req)
    {
        $get_id = $req->id;
        $get_all = $req->all();
        return $this->updateTask($get_id, $get_all);
    }

    public function actionUpdateEvent(Request $req)
    {
        $get_id = $req->id;
        $get_all = $req->all();
        return $this->updateEvent($get_id, $get_all);
    }

    public function actionUpdateLeaveRequest(Request $req)
    {
        $get_id = $req->id;
        $get_all = $req->all();
        return $this->updateLeaveReq($get_id, $get_all);
    }

    public function actionUpdateLeaveRequestApprov(Request $req)
    {
        $get_id = $req->id;
        $get_all = $req->all();
        return $this->setStatusApprove($get_id, $get_all);
    }

    public function actionUpdateLeaveRequestRejct(Request $req)
    {
        $get_id = $req->id;
        $get_all = $req->all();
        return $this->setStatusReject($get_id, $get_all);
    }


    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function call bussiness Logic Action Delete  { D }           |
     *                                                                               |
     * ==============================================================================+
     */

    public function clearUser($id)
    {
        return $this->delUser($id);
    }

    public function deleteTask($id)
    {
        return $this->delTask($id);
    }

    public function deleteEvent($id)
    {
        return $this->delEvent($id);
    }

    public function deleteleaveReq($id)
    {
        return $this->delLvr($id);
    }

    /**
     * ==============================================================================+
     *                                                                               |
     *                  Function call Another bussiness Logic                        |
     *                                                                               |
     * ==============================================================================+
     */
}
