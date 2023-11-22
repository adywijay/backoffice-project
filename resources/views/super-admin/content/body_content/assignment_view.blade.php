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
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#createtask"><i class="icofont-plus-circle me-2 fs-6"></i>Create
                                    Task</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix  g-3">
                <div class="col-lg-12 col-md-12 flex-column">
                    <div class="row g-3 row-deck">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="mb-0 fw-bold ">Allocated Task Members</h6>
                                </div>
                                <div class="card-body">
                                    <div class="flex-grow-1 mem-list" id="list-assignment">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                        </div>
                    </div>
                    <div class="row taskboard g-3 py-xxl-4"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create task-->
    <div class="modal fade" id="createtask" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="btnvh-center">
                        <h5 class="modal-title  fw-bold">Create :: Task</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="task-form-add" name="task-form-add">
                        @csrf
                        <input hidden type="number" name="author_id" id="author_id" value="{{ Auth::user()->id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Project Name</label>
                            <input class="form-control" type="text" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="category1" class="form-label">Task Category</label>
                            <input class="form-control" type="text" id="category" name="category">
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Hyperlink Assignment</label>
                            <input class="form-control" type="text" id="link" name="link">
                        </div>
                        <div class="deadline-form mb-3">
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
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm">
                                <label for="user_id" class="form-label">Task Assign Person</label>
                                <select class="form-select" aria-label="Default select Priority" name="user_id"
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
                        <div class="modal-footer">
                            <div class="btnvh-center">
                                <button type="submit" id="do-save-task" class="btn btn-primary"
                                    onclick="addtask()">Save
                                </button>
                                <a href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </form>
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
                    <div class="btnvh-center">
                        <h5 class="modal-title  fw-bold">Task :: Edit</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="edit-form-task" name="edit-form-task">
                        @csrf
                        <input hidden type="number" name="id1" id="id1">
                        <div class="mb-3">
                            <label for="name1" class="form-label">Project Name</label>
                            <input class="form-control" type="text" id="name1" name="name1">
                        </div>
                        <div class="mb-3">
                            <label for="category1" class="form-label">Task Category</label>
                            <input class="form-control" type="text" id="category1" name="category1">
                        </div>
                        <div class="mb-3">
                            <label for="link1" class="form-label">Hyperlink Assignment</label>
                            <input class="form-control" type="text" id="link1" name="link1">
                        </div>
                        <div class="deadline-form mb-3">
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
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm">
                                <label for="user_id1" class="form-label">Task Assign Person</label>
                                <select class="form-select" aria-label="Default select Priority" name="user_id1"
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
                                    <option></option>
                                    <option value="To-Do">To - Do</option>
                                    <option value="Inprogress">Inprogress</option>
                                    <option value="Complete">Complete</option>
                                    <option value="Review">Review</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="btnvh-center">
                                <button type="submit" id="action-update-task" class="btn btn-primary"
                                    onclick="update_task()">Update
                                </button>
                                <a href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </form>
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

                    let html = "";
                    $(data).each(function(i, data) {


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
            $("form[name='task-form-add']").validate({
                rules: {
                    name: "required",
                    category: "required",
                    start_date: {
                        required: true
                    },
                    end_date: {
                        required: true
                    },
                    link: "required",
                    status: "required",
                    user_id: "required"
                },
                messages: {
                    name: "Please enter project name",
                    category: "Please enter category",
                    start_date: "Please enter start date",
                    end_date: "Please enter end date",
                    link: "Please enter link task",
                    status: "Please select status",
                    user_id: "Please select assignment to"
                },
                submitHandler: function(form) {
                    var name = $('#name').val();
                    var category = $('#category').val();
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();
                    var link = $('#link').val();
                    var status = $('#status').val();
                    var user_id = $('#user_id').val();
                    var author_id = $('#author_id').val();

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
                            user_id: user_id,
                            author_id: author_id
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
            var id = id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "getby/" + id,
                dataType: 'json',
                cache: false,
                type: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    $('#pre_edit_task').modal('show');
                    $("#id1").val(data.id);
                    $('#name1').val(data.name)
                    $('#category1').val(data.category);
                    $('#start_date1').val(data.start_date);
                    $('#end_date1').val(data.end_date);
                    $('#link1').val(data.link);
                    $('#status1').val(data.status);
                    $('#user_id1').val(data.user_id);
                }
            });
        }

        function update_task() {
            $("form[name='edit-form-task']").validate({
                rules: {
                    name1: "required",
                    category1: "required",
                    start_date1: {
                        required: true
                    },
                    end_date1: {
                        required: true
                    },
                    link1: "required",
                    status1: "required",
                    user_id1: "required"
                },
                messages: {
                    name1: "Please enter project name",
                    category1: "Please enter category",
                    start_date1: "Please enter start date",
                    end_date1: "Please enter end date",
                    link1: "Please enter link task",
                    status1: "Please select status",
                    user_id1: "Please select assignment to"
                },
                submitHandler: function(form) {
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
            });
        }
    </script>
@endsection
