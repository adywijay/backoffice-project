@extends('admin.page.call-fixed-page')
@section('body-content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl" id="fresh-container">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">List :: Assignment</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal"
                                data-bs-target="#createtask"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="task-list1" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Project</th>
                                        <th>Assignment</th>
                                        <th>Status</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($get) < 0)
                                        <tr>
                                            <td colspan="6" style="text-align: center;">
                                                <span class="fw-bold text-secondary">No data record found</span>
                                            </td>
                                        </tr>
                                    @endif
                                    @foreach ($get as $list)
                                        <tr>
                                            <td>{{ $list->project_name }}</td>
                                            <td>{{ $list->user_name }}</td>
                                            <td>
                                                @if ($list->status == 'To-Do')
                                                    <span class="badge bg-danger">{{ __($list->status) }}</span>
                                                @elseif ($list->status == 'Inprogress')
                                                    <span class="badge bg-warning">{{ __($list->status) }}</span>
                                                @elseif ($list->status == 'Complete')
                                                    <span class="badge bg-success">{{ __($list->status) }}</span>
                                                @else
                                                    <span class="badge bg-info">{{ __($list->status) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $list->sd }}</td>
                                            <td>{{ $list->ed }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a href="javascript:void(0)"
                                                        onclick="call_view_edit_task({{ $list->id_task }})"
                                                        class="btn btn-outline-secondary">
                                                        <i class="icofont-edit text-success"></i>
                                                    </a>
                                                    <button class="btn btn-outline-secondary deleterow"
                                                        onclick="deltask({{ $list->id_task }})"><i
                                                            class="icofont-ui-delete text-danger"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                            <label for="category" class="form-label">Task Category</label>
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
                                <button type="submit" id="send-task" class="btn btn-primary" onclick="addtask()">Create
                                </button>
                                <a href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                                <label for="user_id" class="form-label">Task Assign Person</label>
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
                                    <option disabled></option>
                                    <option value="To-Do">To - Do</option>
                                    <option value="Inprogress">Inprogress</option>
                                    <option value="Complete">Complete</option>
                                    <option value="Review">Review</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="btnvh-center">
                                <button type="submit" id="save-edit-task" class="btn btn-primary"
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
            $('#task-list1').addClass('nowrap').dataTable({
                responsive: true,
                columnDefs: [{
                    targets: [-1, -3],
                    className: 'dt-body-right'
                }]
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('get_name_ad') }}",
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
                        url: "{{ url('admin/assignment/delete') }}" + '/' + id, //Define Post URL
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
                                window.location.reload();
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                window.location.reload();
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            });

        }

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
                        url: "{{ route('task_add_ad') }}",
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
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                window.location.reload();
                            } else {
                                $('#createtask').modal('hide');
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                window.location.reload();
                            }
                        }
                    });
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
                        url: "{{ route('task_update_ad') }}",
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
                                window.location.reload();
                            } else {
                                $('#pre_edit_task').modal('hide');
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        }
    </script>
@endsection
