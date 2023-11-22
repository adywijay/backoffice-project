@extends('super-admin.page.call-fixed-page')
@section('body-content')
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Task Management</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal"
                                data-bs-target="#createtask"><i class="icofont-plus-circle me-2 fs-6"></i>Create
                                Task</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix  g-3">
                <div class="col-lg-12 col-md-12 flex-column">
                    <div class="row g-3 row-deck">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="mb-0 fw-bold ">Task Progress</h6>
                                </div>
                                <div class="card-body mem-list">
                                    <div class="progress-count mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <h6 class="mb-0 fw-bold d-flex align-items-center">UI/UX Design</h6>
                                            <span class="small text-muted">02/07</span>
                                        </div>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar light-info-bg" role="progressbar" style="width: 92%"
                                                aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-count mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <h6 class="mb-0 fw-bold d-flex align-items-center">Website Design</h6>
                                            <span class="small text-muted">01/03</span>
                                        </div>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar bg-lightgreen" role="progressbar" style="width: 60%"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-count mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <h6 class="mb-0 fw-bold d-flex align-items-center">Quality Assurance</h6>
                                            <span class="small text-muted">02/07</span>
                                        </div>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar light-success-bg" role="progressbar" style="width: 40%"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-count mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <h6 class="mb-0 fw-bold d-flex align-items-center">Development</h6>
                                            <span class="small text-muted">01/05</span>
                                        </div>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar light-orange-bg" role="progressbar" style="width: 40%"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="progress-count mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <h6 class="mb-0 fw-bold d-flex align-items-center">Testing</h6>
                                            <span class="small text-muted">01/08</span>
                                        </div>
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar bg-lightyellow" role="progressbar" style="width: 30%"
                                                aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="mb-0 fw-bold ">Recent Activity</h6>
                                </div>
                                <div class="card-body mem-list">
                                    <div class="timeline-item ti-danger border-bottom ms-2">
                                        <div class="d-flex">
                                            <span
                                                class="avatar d-flex justify-content-center align-items-center rounded-circle light-success-bg">RH</span>
                                            <div class="flex-fill ms-3">
                                                <div class="mb-1"><strong>Rechard Add New Task</strong></div>
                                                <span class="d-flex text-muted">20Min ago</span>
                                            </div>
                                        </div>
                                    </div> <!-- timeline item end  -->
                                    <div class="timeline-item ti-info border-bottom ms-2">
                                        <div class="d-flex">
                                            <span
                                                class="avatar d-flex justify-content-center align-items-center rounded-circle bg-careys-pink">SP</span>
                                            <div class="flex-fill ms-3">
                                                <div class="mb-1"><strong>Shipa Review Completed</strong></div>
                                                <span class="d-flex text-muted">40Min ago</span>
                                            </div>
                                        </div>
                                    </div> <!-- timeline item end  -->
                                    <div class="timeline-item ti-info border-bottom ms-2">
                                        <div class="d-flex">
                                            <span
                                                class="avatar d-flex justify-content-center align-items-center rounded-circle bg-careys-pink">MR</span>
                                            <div class="flex-fill ms-3">
                                                <div class="mb-1"><strong>Mora Task To Completed</strong></div>
                                                <span class="d-flex text-muted">1Hr ago</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item ti-success  ms-2">
                                        <div class="d-flex">
                                            <span
                                                class="avatar d-flex justify-content-center align-items-center rounded-circle bg-lavender-purple">FL</span>
                                            <div class="flex-fill ms-3">
                                                <div class="mb-1"><strong>Fila Add New Task</strong></div>
                                                <span class="d-flex text-muted">1Day ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- .card: My Timeline -->
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="mb-0 fw-bold ">Allocated Task Members</h6>
                                </div>
                                <div class="card-body">
                                    <div class="flex-grow-1 mem-list" id="list-assignment">

                                    </div>
                                </div>
                            </div> <!-- .card: My Timeline -->
                        </div>
                    </div>
                    <div class="row taskboard g-3 py-xxl-4"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Members-->
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="addUserLabel">Employee Invitation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="inviteby_email">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email address"
                                id="exampleInputEmail1" aria-describedby="exampleInputEmail1">
                            <button class="btn btn-dark" type="button" id="button-addon2">Sent</button>
                        </div>
                    </div>
                    <div class="members_list">
                        <h6 class="fw-bold ">Employee </h6>
                        <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0">
                            <li class="list-group-item py-3 text-center text-md-start">
                                <div
                                    class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                    <div class="no-thumbnail mb-2 mb-md-0">
                                        <img class="avatar lg rounded-circle" src="assets/images/xs/avatar2.jpg"
                                            alt="">
                                    </div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <h6 class="mb-0  fw-bold">Rachel Carr(you)</h6>
                                        <span class="text-muted">rachel.carr@gmail.com</span>
                                    </div>
                                    <div class="members-action">
                                        <span class="members-role ">Admin</span>
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-transparent dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icofont-ui-settings  fs-6"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item py-3 text-center text-md-start">
                                <div
                                    class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                    <div class="no-thumbnail mb-2 mb-md-0">
                                        <img class="avatar lg rounded-circle" src="assets/images/xs/avatar3.jpg"
                                            alt="">
                                    </div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <h6 class="mb-0  fw-bold">Lucas Baker<a href="#"
                                                class="link-secondary ms-2">(Resend invitation)</a></h6>
                                        <span class="text-muted">lucas.baker@gmail.com</span>
                                    </div>
                                    <div class="members-action">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-transparent dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Members
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="icofont-check-circled"></i>

                                                        <span>All operations permission</span>
                                                    </a>

                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fs-6 p-2 me-1"></i>
                                                        <span>Only Invite & manage team</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-transparent dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icofont-ui-settings  fs-6"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="icofont-delete-alt fs-6 me-2"></i>Delete Member</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item py-3 text-center text-md-start">
                                <div
                                    class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
                                    <div class="no-thumbnail mb-2 mb-md-0">
                                        <img class="avatar lg rounded-circle" src="assets/images/xs/avatar8.jpg"
                                            alt="">
                                    </div>
                                    <div class="flex-fill ms-3 text-truncate">
                                        <h6 class="mb-0  fw-bold">Una Coleman</h6>
                                        <span class="text-muted">una.coleman@gmail.com</span>
                                    </div>
                                    <div class="members-action">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-transparent dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Members
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="icofont-check-circled"></i>

                                                        <span>All operations permission</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fs-6 p-2 me-1"></i>
                                                        <span>Only Invite & manage team</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group">
                                            <div class="btn-group">
                                                <button type="button" class="btn bg-transparent dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="icofont-ui-settings  fs-6"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                class="icofont-delete-alt fs-6 me-2"></i>Suspend member</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                class="icofont-not-allowed fs-6 me-2"></i>Delete Member</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create task-->
    <div class="modal fade" id="createtask" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Create Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="task-form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Project Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Task Category</label>
                            <input type="text" class="form-control" name="category" id="category">
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Hyperlink Assignment</label>
                            <input class="form-control" type="text" id="link" name="link">
                        </div>
                        <div class="deadline-form mb-3">
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <label for="start_date" class="form-label">Task Start Date</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date">
                                    </div>
                                    <div class="col">
                                        <label for="end_date" class="form-label">Task End Date</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm">
                                <label for="user_id" class="form-label">Task Assign Person</label>
                                <select class="form-select" aria-label="Default select Priority" name="id_user"
                                    id="user_id">
                                    <option disable></option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm">
                                <label class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select Priority" name="status"
                                    id="status">
                                    <option selected></option>
                                    <option value="To-Do">To - Do</option>
                                    <option value="Inprogress">Inprogress</option>
                                    <option value="Complete">Complete</option>
                                    <option value="Review">Review</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <div class="btnvh-center">
                            <button type="submit" id="submit" class="btn btn-primary" onclick="addtask()">Simpan
                            </button>
                            <a href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row taskboard g-3 py-xxl-4" id="live-count-task">
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 mt-xxl-4 mt-xl-4 mt-lg-4 mt-md-4 mt-sm-4 mt-4">
            <h6 class="fw-bold py-3 mb-0">
                To Do List &nbsp;
                <span class="badge bg-warning text-end mt-2">{{ count($call_todo) }}</span>
            </h6>
            @foreach ($call_todo as $list)
                <div class="progress_task">
                    <div class="dd bg-error">
                        <ol class="dd-list">
                            <li class="dd-item" data-id="1">
                                <div class="dd-handle">
                                    <div class="task-info d-flex align-items-center justify-content-between">
                                        <h6
                                            class="light-success-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-14 mb-0">
                                            {{ $list->project_name }}
                                        </h6>
                                        <div
                                            class="task-priority d-flex flex-column align-items-center justify-content-center">
                                            <div class="avatar-list avatar-list-stacked m-0">
                                                <i class="icofont-tasks-alt fs-5"></i>
                                            </div>
                                            <span class="badge bg-danger text-end mt-2">{{ $list->status }}</span>
                                        </div>
                                    </div>
                                    <p class="py-2 mb-0">{{ $list->ulink }}</p>
                                    <div class="tikit-info row g-3 align-items-center">
                                        <div class="col-sm">
                                            <ul class="d-flex list-unstyled align-items-center flex-wrap">
                                                <li class="me-2">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-flag"></i>
                                                        <span class="ms-1">{{ $list->sd }}</span>
                                                    </div>
                                                </li>
                                                <li class="me-2">
                                                    <div class="d-flex align-items-center">

                                                        <i class="icofont-tick-mark"></i>
                                                        <span class="ms-1">{{ $list->ed }}</span>

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-business-man-alt-1"></i>
                                                        <span class="ms-1">{{ $list->user_name }}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm text-end">
                                            <a class="small text-truncate light-success-bg py-1 px-2 rounded-1 d-inline-block fw-bold small"
                                                href="javascript:void(0)"
                                                onclick="call_view_edit_task({{ $list->id_task }})">
                                                <i class="icofont-eye-open"></i>
                                            </a>
                                            <a class="small text-truncate light-danger-bg py-1 px-2 rounded-1 d-inline-block fw-bold small"
                                                href="javascript:void(0)" onclick="deltask({{ $list->id_task }})">
                                                <i class="icofont-database-remove"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        </ol>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 mt-xxl-4 mt-xl-4 mt-lg-4 mt-md-4 mt-sm-4 mt-4">
            <h6 class="fw-bold py-3 mb-0">
                In Progress &nbsp;
                <span class="badge bg-warning text-end mt-2">{{ count($call_inprogress) }}</span>
            </h6>

            @foreach ($call_inprogress as $list)
                <div class="progress_task">
                    <div class="dd">
                        <ol class="dd-list">
                            <li class="dd-item" data-id="1">
                                <div class="dd-handle">
                                    <div class="task-info d-flex align-items-center justify-content-between">
                                        <h6
                                            class="light-success-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-14 mb-0">
                                            {{ $list->project_name }}
                                        </h6>
                                        <div
                                            class="task-priority d-flex flex-column align-items-center justify-content-center">
                                            <div class="avatar-list avatar-list-stacked m-0">
                                                <i class="icofont-spinner-alt-5 fs-5"></i>
                                            </div>
                                            <span class="badge bg-warning text-end mt-2">{{ $list->status }}</span>
                                        </div>
                                    </div>
                                    <p class="py-2 mb-0">{{ $list->ulink }}</p>
                                    <div class="tikit-info row g-3 align-items-center">
                                        <div class="col-sm">
                                            <ul class="d-flex list-unstyled align-items-center flex-wrap">
                                                <li class="me-2">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-flag"></i>
                                                        <span class="ms-1">{{ $list->sd }}</span>
                                                    </div>
                                                </li>
                                                <li class="me-2">
                                                    <div class="d-flex align-items-center">

                                                        <i class="icofont-tick-mark"></i>
                                                        <span class="ms-1">{{ $list->ed }}</span>

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-business-man-alt-1"></i>
                                                        <span class="ms-1">{{ $list->user_name }}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm text-end">
                                            <a class="small text-truncate light-success-bg py-1 px-2 rounded-1 d-inline-block fw-bold small"
                                                href="javascript:void(0)"
                                                onclick="call_view_edit_task({{ $list->id_task }})">
                                                <i class="icofont-eye-open"></i>
                                            </a>
                                            <a class="small text-truncate light-danger-bg py-1 px-2 rounded-1 d-inline-block fw-bold small"
                                                href="javascript:void(0)" onclick="deltask({{ $list->id_task }})">
                                                <i class="icofont-database-remove"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        </ol>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 mt-xxl-4 mt-xl-4 mt-lg-4 mt-md-0 mt-sm-0 mt-0">
            <h6 class="fw-bold py-3 mb-0">
                Needs Review &nbsp;
                <span class="badge bg-warning text-end mt-2">{{ count($call_review) }}</span>
            </h6>
            @foreach ($call_review as $list)
                <div class="review_task">
                    <div class="dd">
                        <ol class="dd-list">
                            <li class="dd-item" data-id="1">
                                <div class="dd-handle">
                                    <div class="task-info d-flex align-items-center justify-content-between">
                                        <h6
                                            class="light-success-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-14 mb-0">
                                            {{ $list->project_name }}
                                        </h6>
                                        <div
                                            class="task-priority d-flex flex-column align-items-center justify-content-center">
                                            <div class="avatar-list avatar-list-stacked m-0">
                                                <i class="icofont-read-book-alt fs-5"></i>
                                            </div>
                                            <span class="badge bg-info text-end mt-2">{{ $list->status }}</span>
                                        </div>
                                    </div>
                                    <p class="py-2 mb-0">{{ $list->ulink }}</p>
                                    <div class="tikit-info row g-3 align-items-center">
                                        <div class="col-sm">
                                            <ul class="d-flex list-unstyled align-items-center flex-wrap">
                                                <li class="me-2">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-flag"></i>
                                                        <span class="ms-1">{{ $list->sd }}</span>
                                                    </div>
                                                </li>
                                                <li class="me-2">
                                                    <div class="d-flex align-items-center">

                                                        <i class="icofont-tick-mark"></i>
                                                        <span class="ms-1">{{ $list->ed }}</span>

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-business-man-alt-1"></i>
                                                        <span class="ms-1">{{ $list->user_name }}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm text-end">
                                            <a class="small text-truncate light-success-bg py-1 px-2 rounded-1 d-inline-block fw-bold small"
                                                href="javascript:void(0)"
                                                onclick="call_view_edit_task({{ $list->id_task }})">
                                                <i class="icofont-eye-open"></i>
                                            </a>
                                            <a class="small text-truncate light-danger-bg py-1 px-2 rounded-1 d-inline-block fw-bold small"
                                                href="javascript:void(0)" onclick="deltask({{ $list->id_task }})">
                                                <i class="icofont-database-remove"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        </ol>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 mt-xxl-4 mt-xl-4 mt-lg-4 mt-md-0 mt-sm-0 mt-0">
            <h6 class="fw-bold py-3 mb-0">
                Completed &nbsp;
                <span class="badge bg-warning text-end mt-2">{{ count($call_done) }}</span>
            </h6>
            @foreach ($call_done as $list)
                <div class="completed_task">
                    <div class="dd">
                        <ol class="dd-list">
                            <li class="dd-item" data-id="1">
                                <div class="dd-handle">
                                    <div class="task-info d-flex align-items-center justify-content-between">
                                        <h6
                                            class="light-success-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-14 mb-0">
                                            {{ $list->project_name }}
                                        </h6>
                                        <div
                                            class="task-priority d-flex flex-column align-items-center justify-content-center">
                                            <div class="avatar-list avatar-list-stacked m-0">
                                                <i class="icofont-tick-boxed fs-5"></i>
                                            </div>
                                            <span class="badge bg-success text-end mt-2">{{ $list->status }}</span>
                                        </div>
                                    </div>
                                    <p class="py-2 mb-0">{{ $list->ulink }}</p>
                                    <div class="tikit-info row g-3 align-items-center">
                                        <div class="col-sm">
                                            <ul class="d-flex list-unstyled align-items-center flex-wrap">
                                                <li class="me-2">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-flag"></i>
                                                        <span class="ms-1">{{ $list->sd }}</span>
                                                    </div>
                                                </li>
                                                <li class="me-2">
                                                    <div class="d-flex align-items-center">

                                                        <i class="icofont-tick-mark"></i>
                                                        <span class="ms-1">{{ $list->ed }}</span>

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-business-man-alt-1"></i>
                                                        <span class="ms-1">{{ $list->user_name }}</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm text-end">
                                            <a class="small text-truncate light-success-bg py-1 px-2 rounded-1 d-inline-block fw-bold small"
                                                href="javascript:void(0)"
                                                onclick="call_view_edit_task({{ $list->id_task }})">
                                                <i class="icofont-eye-open"></i>
                                            </a>
                                            <a class="small text-truncate light-danger-bg py-1 px-2 rounded-1 d-inline-block fw-bold small"
                                                href="javascript:void(0)" onclick="deltask({{ $list->id_task }})">
                                                <i class="icofont-database-remove"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        </ol>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal  View Edit Task-->
    <div class="modal fade" id="pre_edit_task" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="pre_edit_task_label"> Edit Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-form">
                        @csrf
                        <input hidden type="number" name="id1" id="id1">
                        <div class="mb-3">
                            <label class="form-label" for="name">Project Name</label>
                            <select class="form-select" aria-label="Default select Project Category" name="name1"
                                id="name1">
                                <option disabled></option>
                                <option value="backoffice-hr">Back-Office HR</option>
                                <option value="undangan-nikah">Undangan Nikah</option>
                                <option value="simrs">SIM-RS</option>
                                <option value="ujian-online">Ujian Online</option>
                                <option value="bt-ar">Augmented Reality</option>
                                <option value="cisec-tools">Cyber Security Tools</option>
                                <option value="big-data">Big Data</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Task Category</label>
                            <select class="form-select" aria-label="Default select Project Category" name="category1"
                                id="category1">
                                <option disabled></option>
                                <option value="Web-Dev">Website Design</option>
                                <option value="Apps-Dev">App Development</option>
                                <option value="QA">Quality Assurance</option>
                                <option value="Dev">Development</option>
                                <option value="Backed-Dev">Backend Development</option>
                                <option value="SQA">Software Testing</option>
                                <option value="Web-Design">Website Design</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Seo">SEO</option>
                                <option value="Etc">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="link1" class="form-label">Hyperlink Assignment</label>
                            <input class="form-control" type="text" id="link1" name="link1">
                        </div>
                        <div class="deadline-form mb-3">
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <label for="start_date1" class="form-label">Task Start Date</label>
                                        <input type="date" class="form-control" name="start_date1" id="start_date1">
                                    </div>
                                    <div class="col">
                                        <label for="end_date1" class="form-label">Task End Date</label>
                                        <input type="date" class="form-control" name="end_date1" id="end_date1">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm">
                                <label for="user_id" class="form-label">Task Assign Person</label>
                                <select class="form-select" aria-label="Default select Priority" name="id_user1"
                                    id="user_id1">
                                    <option disable></option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm">
                                <label class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select Priority" name="status1"
                                    id="status1">
                                    <option disabled></option>
                                    <option value="To-Do">To - Do</option>
                                    <option value="Inprogress">Inprogress</option>
                                    <option value="Complete">Complete</option>
                                    <option value="Review">Review</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <div class="btnvh-center">
                            <button type="submit" id="submit_edit_task" class="btn btn-primary"
                                onclick="update_task()">Update
                            </button>
                            <a href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type='text/javascript'>
        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('task_all_sa') }}",
                dataType: 'json',
                cache: false,
                type: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    //console.log(data);
                    let html = "";
                    $(data).each(function(i, data) {
                        //console.log(data.length);

                        html += '<div class="py-2 d-flex align-items-center border-bottom">' +
                            '<div class="d-flex ms-2 align-items-center flex-fill">' +
                            '<img src="{{ URL::asset('assets/images/xs/avatar6.jpg') }}" class="avatar lg rounded-circle img-thumbnail" alt="avatar">' +
                            '<div class="d-flex flex-column ps-2">' +
                            '<h6 class="fw-bold mb-0"><a href="javascript:void(0)" onclick="call_view_edit_task(' +
                            data.id + ')">' + data
                            .name + '</a></h6>' +
                            '<span class="small text-muted">' + data.category + '</span>' +
                            '</div>' +
                            '</div>' +
                            '<button type="button" class="btn light-danger-bg text-end" onclick="deltask(' +
                            data.id +
                            ')">Remove</button>' +
                            '</div>';
                    })
                    $('#list-assignment').html(html);
                }
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('get_name_foroption') }}",
                dataType: 'json',
                cache: false,
                type: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data) {
                        $("#user_id").empty();
                        $("#user_id1").empty();
                        $("#user_id").append('<option disable></option>');
                        $("#user_id1").append('<option disable></option>');
                        $(data).each(function(i, data) {
                            $("#user_id").append(
                                '<option value="' + data.id + '">' + data.name +
                                '</option>');
                            $("#user_id1").append(
                                '<option value="' + data.id + '">' + data.name +
                                '</option>');
                        });
                    } else {
                        $("#user_id").empty();
                        $("#user_id1").empty();
                    }
                }
            });
        });

        function addtask() {

            var name = $('#name').val();
            var category = $('#category').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            var link = $('#link').val();
            var status = $('#status').val();
            var user_id = $('#user_id').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('task_add_sa') }}",
                dataType: 'json',
                cache: false,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    category: category,
                    start_date: start_date,
                    end_date: end_date,
                    link: link,
                    status: status,
                    user_id: user_id
                },
                success: function(data) {

                    if (data['respon_code'] === 201) {
                        $('#createtask').modal('hide');
                        // $('#list-assignment').contentWindow.location.reload(true);
                        Swal.fire({
                            icon: 'success',
                            title: data['message'],
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $("#list-assignment").load("#list-assignment");
                    } else {
                        $('#createtask').modal('hide');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data['message'],
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $("#list-assignment").load("#list-assignment");
                    }
                }
            });
        }


        function deltask(id) {
            Swal.fire({
                title: "Delete.?",
                icon: 'error',
                text: "Are you sure.!",
                showCancelButton: !0,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: "Yes, deleted.!",
                cancelButtonText: "No, cancel.!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ url('super-admin/assignment/delete') }}" + '/' + id, //Define Post URL
                        dataType: 'json',
                        type: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(data) {

                            if (data['respon_code'] === 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $("#list-assignment").load("#list-assignment");
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            });

        }

        function call_view_edit_task(id) {
            $.get('getby/' + id, function(data) {
                $('#pre_edit_task').modal('show');
                $("#id1").val(data.id);
                $('#name1').val(data.name)
                $('#category1').val(data.category);
                $('#start_date1').val(data.start_date);
                $('#end_date1').val(data.end_date);
                $('#link1').val(data.link);
                $('#status1').val(data.status);
                $('#user_id1').val(data.user_id);
            });
        }

        function update_task() {

            var id = $('#id1').val();
            var name = $('#name1').val();
            var category = $('#category1').val();
            var start_date = $('#start_date1').val();
            var end_date = $('#end_date1').val();
            var link = $('#link1').val();
            var status = $('#status1').val();
            var user_id = $('#user_id1').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('task_update_sa') }}",
                dataType: 'json',
                cache: false,
                type: 'PUT',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    name: name,
                    category: category,
                    start_date: start_date,
                    end_date: end_date,
                    link: link,
                    status: status,
                    user_id: user_id
                },
                success: function(data) {

                    if (data['respon_code'] === 200) {
                        $('#pre_edit_task').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: data['message'],
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $("#list-assignment").load("#list-assignment");
                    } else {
                        $('#pre_edit_task').modal('hide');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data['message'],
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });
        }
    </script>
@endsection
