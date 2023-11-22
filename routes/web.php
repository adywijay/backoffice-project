<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RedirectPages;
# use App\Http\Controllers\Auth\ResetPasswordController;
# use App\Http\Controllers\Auth\ForgotPasswordController;
# use App\Http\Controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

/* Route function login For User */
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('not_found', [RedirectPages::class, 'notFound'])->name('no_auth');

/* Route function logout For User */
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('super-admin')->group(

    function () {

        Route::get('/', [SuperAdminController::class, 'index'])->name('home_sa');
        ## Route::get('/tes', [SuperAdminController::class, 'Tes'])->name('tes'); load-my-event.blade.php

        /*+++++++++++++++++++++++++++++++++++++++++++++ start routing functionals user +++++++++++++++++++++++++++++++++++++++++++++++*/
        Route::get('/manage_user', [SuperAdminController::class, 'getUser'])->name('manage_usr_sa');
        Route::get('/manage_user/email_exist', [SuperAdminController::class, 'existEmails'])->name('exist_mail');
        Route::get('/manage_user/getid/{id}', [SuperAdminController::class, 'getBeforeUpdate']);
        Route::get('/manage_user/getname_option', [SuperAdminController::class, 'getListNameOption'])->name('get_name_foroption');
        Route::post('/manage_user/reqresetpsw', [SuperAdminController::class, 'resManPassw'])->name('reqreset_sa');
        Route::post('/manage_user/adduser', [SuperAdminController::class, 'addUserRegistration'])->name('adduser_sa');
        Route::put('/manage_user/up', [SuperAdminController::class, 'actionsUpdateUser'])->name('update_user_sa');
        Route::delete('/manage_user/deluser/{id}', [SuperAdminController::class, 'clearUser'])->name('delete_user_sa');
        /*+++++++++++++++++++++++++++++++++++++++++++++ end routing functionals user +++++++++++++++++++++++++++++++++++++++++++++++*/

        /*+++++++++++++++++++++++++++++++++++++++++++++ start routing functionals task +++++++++++++++++++++++++++++++++++++++++++++++*/
        Route::get('/assignment/mapping', [SuperAdminController::class, 'mappingTask'])->name('mapping_task_sa');
        Route::get('/assignment/list_task', [SuperAdminController::class, 'getListTask'])->name('list_task_sa');
        Route::get('/assignment/getall', [SuperAdminController::class, 'retriveAllTask'])->name('task_all_sa');
        Route::get('/assignment/getby/{id}', [SuperAdminController::class, 'getsByIdTask']);
        Route::put('/assignment/update', [SuperAdminController::class, 'actionUpdateTask'])->name('task_update_sa');
        Route::post('/assignment/add', [SuperAdminController::class, 'insertTask'])->name('task_add_sa');
        Route::delete('/assignment/delete/{id}', [SuperAdminController::class, 'deleteTask']);
        /*+++++++++++++++++++++++++++++++++++++++++++++ end routing functionals user +++++++++++++++++++++++++++++++++++++++++++++++*/

        /*+++++++++++++++++++++++++++++++++++++++++++++ start routing functionals perform +++++++++++++++++++++++++++++++++++++++++++++++*/
        Route::get('/employees/perform', [SuperAdminController::class, 'getPerform'])->name('employe_perform_sa');
        /*+++++++++++++++++++++++++++++++++++++++++++++ end routing functionals perform +++++++++++++++++++++++++++++++++++++++++++++++*/

        /*+++++++++++++++++++++++++++++++++++++++++++++ start routing functionals event +++++++++++++++++++++++++++++++++++++++++++++++*/
        Route::get('/office/event', [SuperAdminController::class, 'eventOfficer'])->name('event_officer_sa');
        Route::post('/office/event/new_event', [SuperAdminController::class, 'insertEvent'])->name('new_event_officer_sa');
        Route::get('/office/event/all', [SuperAdminController::class, 'getEventAll'])->name('get_event_officer_sa');
        Route::get('/office/event/management', [SuperAdminController::class, 'managementEvent'])->name('get_event_management_sa');
        Route::get('/office/event/getby/{id}', [SuperAdminController::class, 'getByEventId']);
        Route::put('/office/event/update', [SuperAdminController::class, 'actionUpdateEvent'])->name('event_update_sa');
        Route::delete('/office/event/delete/{id}', [SuperAdminController::class, 'deleteEvent']);
        /*+++++++++++++++++++++++++++++++++++++++++++++ end routing functionals event +++++++++++++++++++++++++++++++++++++++++++++++*/

        /*+++++++++++++++++++++++++++++++++++++++++++++ start routing functionals leave management +++++++++++++++++++++++++++++++++++++++++++++++*/
        Route::get('/leave/management', [SuperAdminController::class, 'managementLeaveReq'])->name('leave_management_sa');
        Route::get('/leave/management/getby/{id}', [SuperAdminController::class, 'getByIdLeaveReq']);
        Route::post('/leave/management/add_request', [SuperAdminController::class, 'addReqLeave'])->name('leave_management_req_sa');
        Route::put('/leave/management/update', [SuperAdminController::class, 'actionUpdateLeaveRequest'])->name('leave_management_update_sa');
        Route::put('/leave/management/set/ok', [SuperAdminController::class, 'actionUpdateLeaveRequestApprov'])->name('leave_ok_update_sa');
        Route::put('/leave/management/set/not', [SuperAdminController::class, 'actionUpdateLeaveRequestRejct'])->name('leave_not_update_sa');
        Route::delete('/leave/management/delete/{id}', [SuperAdminController::class, 'deleteleaveReq']);
        /*+++++++++++++++++++++++++++++++++++++++++++++ end routing functionals leave management +++++++++++++++++++++++++++++++++++++++++++++++*/
    }
);

Route::prefix('admin')->group(

    function () {
        /*+++++++++++++++++++++++++++++++++++++++++++++ start routing functionals task +++++++++++++++++++++++++++++++++++++++++++++++*/
        Route::get('/', [AdminController::class, 'index'])->name('home_ad');
        Route::get('/assignment/mapping', [AdminController::class, 'mappingTask'])->name('mapping_task_ad');
        Route::get('/getname_option', [AdminController::class, 'getListNameOption'])->name('get_name_ad');
        Route::get('/assignment/list_task', [AdminController::class, 'getListTask'])->name('list_task_ad');
        Route::get('/assignment/getall', [AdminController::class, 'retriveAllTask'])->name('task_all_ad');
        Route::get('/assignment/getby/{id}', [AdminController::class, 'getsByIdTask']);
        Route::put('/assignment/update', [AdminController::class, 'actionUpdateTask'])->name('task_update_ad');
        Route::post('/assignment/add', [AdminController::class, 'insertTask'])->name('task_add_ad');
        Route::delete('/assignment/delete/{id}', [AdminController::class, 'deleteTask']);
        /*+++++++++++++++++++++++++++++++++++++++++++++ end routing functionals user +++++++++++++++++++++++++++++++++++++++++++++++*/
        /*+++++++++++++++++++++++++++++++++++++++++++++ start routing functionals perform +++++++++++++++++++++++++++++++++++++++++++++++*/
        Route::get('/employees/perform', [AdminController::class, 'keyPerformIndicator'])->name('employe_perform_ad');
        /*+++++++++++++++++++++++++++++++++++++++++++++ end routing functionals perform +++++++++++++++++++++++++++++++++++++++++++++++*/

        /*+++++++++++++++++++++++++++++++++++++++++++++ start routing functionals event +++++++++++++++++++++++++++++++++++++++++++++++*/
        Route::get('/dashboard/event', [AdminController::class, 'eventOfficer'])->name('event_officer_ad');
        Route::post('/event/new_event', [AdminController::class, 'insertEvent'])->name('new_event_officer_ad');
        Route::get('/event/all', [AdminController::class, 'getEventAll'])->name('get_event_officer_ad');
        Route::get('/event/management', [AdminController::class, 'managementEvent'])->name('get_event_management_ad');
        Route::get('/event/getby/{id}', [AdminController::class, 'getByEventId']);
        Route::put('/event/update', [AdminController::class, 'actionUpdateEvent'])->name('event_update_ad');
        Route::delete('/event/delete/{id}', [AdminController::class, 'deleteEvent']);
        /*+++++++++++++++++++++++++++++++++++++++++++++ end routing functionals event +++++++++++++++++++++++++++++++++++++++++++++++*/

        /*+++++++++++++++++++++++++++++++++++++++++++++ start routing functionals leave management +++++++++++++++++++++++++++++++++++++++++++++++*/
        Route::get('/leave/management', [AdminController::class, 'managementLeaveReq'])->name('leave_management_ad');
        Route::get('/leave/getby/{id}', [AdminController::class, 'getByIdLeaveReq']);
        Route::post('/leave/add_request', [AdminController::class, 'addReqLeave'])->name('leave_management_req_ad');
        Route::put('/leave/update', [AdminController::class, 'actionUpdateLeaveRequest'])->name('leave_management_update_ad');
        Route::put('/leave/set/ok', [AdminController::class, 'actionUpdateLeaveRequestApprov'])->name('leave_ok_update_ad');
        Route::put('/leave/set/not', [AdminController::class, 'actionUpdateLeaveRequestRejct'])->name('leave_not_update_ad');
        Route::delete('/leave/delete/{id}', [AdminController::class, 'deleteleaveReq']);
        /*+++++++++++++++++++++++++++++++++++++++++++++ end routing functionals leave management +++++++++++++++++++++++++++++++++++++++++++++++*/
    }
);

Route::prefix('employee')->group(

    function () {

        Route::get('/', [EmployeeController::class, 'index'])->name('home_em');
        Route::get('/getname_option', [EmployeeController::class, 'getListNameOption'])->name('get_name_emp');
        Route::get('/assignment/getby/{id}', [EmployeeController::class, 'getsByIdTask']);
        Route::get('/assignment/getby_id/{id}', [EmployeeController::class, 'getTaskBy']);
        Route::get('/assignment/list_task', [EmployeeController::class, 'getListTask'])->name('list_task_em');
        Route::put('/assignment/update', [EmployeeController::class, 'actionUpdateTask'])->name('task_update_em');

        Route::get('/myoffice/events', [EmployeeController::class, 'getMyEvent'])->name('list_event_em');
        Route::get('/myoffice/event/all', [EmployeeController::class, 'getEventAll'])->name('get_event_officer_em');
        Route::get('/myoffice/lvr/get', [EmployeeController::class, 'getMyLeaveReq'])->name('get_lvr_officer_em');
        Route::get('/myoffice/lvr/getby/{id}', [EmployeeController::class, 'getByIdLeaveReq']);
        Route::post('/myoffice/lvr/add_request', [EmployeeController::class, 'addReqLeave'])->name('leave_management_req_em');
        Route::put('/myoffice/lvr/update', [EmployeeController::class, 'actionUpdateLeaveRequest'])->name('leave_management_update_em');
    }
);
