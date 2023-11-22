@extends('admin.page.call-fixed-page')
@section('body-content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl" id="fresh-container">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Leave :: Management</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#add-request"><i class="icofont-plus-circle me-2 fs-6"></i>Add
                                Request</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="req-list" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Reason</th>
                                        <th>Req.Name</th>
                                        <th>Status</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Durations</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) < 0)
                                        <tr>
                                            <td colspan="6" style="text-align: center;">
                                                <span class="fw-bold text-secondary">No data record found</span>
                                            </td>
                                        </tr>
                                    @endif
                                    @foreach ($data as $list)
                                        <tr>
                                            <td>{{ $list->reason }}</td>
                                            <td>{{ $list->req_name }}</td>
                                            <td>
                                                @if ($list->status == 'Waiting')
                                                    <span class="badge bg-warning">{{ __($list->status) }}</span>
                                                @elseif ($list->status == 'Approved')
                                                    <span class="badge bg-success">{{ __($list->status) }}</span>
                                                @else
                                                    <span class="badge bg-danger">{{ __($list->status) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ __($list->sd) }}</td>
                                            <td>{{ __($list->ed) }}</td>
                                            <td>
                                                @if ($list->duration <= 3)
                                                    <span
                                                        class="badge bg-success">{{ __($list->duration) }}&nbsp;Days</span>
                                                @elseif ($list->duration >= 3 && $list->duration <= 7)
                                                    <span
                                                        class="badge bg-warning">{{ __($list->duration) }}&nbsp;Days</span>
                                                @else
                                                    <span class="badge bg-danger">{{ __($list->duration) }}&nbsp;Days</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Button group with nested dropdown">
                                                    <a href="javascript:void(0)"
                                                        onclick="call_view_edit_lv_req({{ $list->id_req }})"
                                                        class="btn btn-outline-secondary">
                                                        <i class="icofont-edit text-success"></i>
                                                    </a>
                                                    <button class="btn btn-outline-secondary"
                                                        onclick="del_lv_req({{ $list->id_req }})"><i
                                                            class="icofont-ui-delete text-danger"></i></button>

                                                    <div class="btn-group" role="group">
                                                        <button id="btn-action-group" type="button"
                                                            class="btn btn-outline-secondary dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            verifications
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="btn-action-group">
                                                            <li><a class="dropdown-item" id="set-ack"
                                                                    href="javascript:void(0)"
                                                                    onclick="set_status({{ $list->id_req }}, null)">Approve</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="javascript:void(0)"
                                                                    id="set-rjt"
                                                                    onclick="set_status(null, {{ $list->id_req }})">Reject</a>
                                                            </li>
                                                        </ul>
                                                    </div>
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

    <div class="modal fade" id="add-request" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <form id="form-add-request" name="form-add-request">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="eventaddLabel">Add Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input hidden type="number" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                        <input hidden type="text" name="ack" id="ack" value="Approved">
                        <input hidden type="text" name="rjt" id="rjt" value="Rejected">
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reasons</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Add reason here"></textarea>
                        </div>
                        <div class="deadline-form">
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="start_date" class="form-label">Event Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>
                                <div class="col">
                                    <label for="end_date" class="form-label">Event End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btnvh-center">
                            <button type="submit" id="do-leave-req" class="btn btn-primary"
                                onclick="add_req_leave()">Request</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="edit-lv-request" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <form id="form-edit-request" name="form-edit-request">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="eventaddLabel">Edit Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input hidden type="number" name="id1" id="id1">
                        <div class="mb-3">
                            <label for="reason1" class="form-label">Reasons</label>
                            <textarea class="form-control" id="reason1" name="reason1" rows="3" placeholder="Add reason here"></textarea>
                        </div>
                        <div class="deadline-form">
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="start_date1" class="form-label">Event Start Date</label>
                                    <input type="date" class="form-control" id="start_date1" name="start_date1">
                                </div>
                                <div class="col">
                                    <label for="end_date1" class="form-label">Event End Date</label>
                                    <input type="date" class="form-control" id="end_date1" name="end_date1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btnvh-center">
                            <button type="submit" id="do-update-req" class="btn btn-primary"
                                onclick="update_lv_req()">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type='text/javascript'>
        $(document).ready(function() {

            $('#req-list').addClass('nowrap').dataTable({
                responsive: true,
                columnDefs: [{
                    targets: [-1, -3],
                    className: 'dt-body-right'
                }]
            });
        });

        function call_view_edit_lv_req(id) {
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
                    $('#edit-lv-request').modal('show');
                    $("#id1").val(data.id);
                    $('#reason1').val(data.reason)
                    $('#start_date1').val(data.start_date);
                    $('#end_date1').val(data.end_date);
                }
            });
        }

        function del_lv_req(id) {
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
                        url: "{{ url('admin/leave/delete') }}" + '/' + id,
                        dataType: 'json',
                        type: 'DELETE',
                        cache: false,
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

        function add_req_leave() {
            $("form[name='form-add-request']").validate({
                rules: {
                    reason: "required",
                    start_date: {
                        required: true
                    },
                    end_date: {
                        required: true
                    }
                },
                messages: {
                    reason: "Please enter reason",
                    start_date: "Please enter start date",
                    end_date: "Please enter end date"
                },
                submitHandler: function(form) {
                    var user_id = $('#user_id').val();
                    var reason = $('#reason').val();
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('leave_management_req_ad') }}",
                        dataType: 'json',
                        cache: false,
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            user_id: user_id,
                            reason: reason,
                            start_date: start_date,
                            end_date: end_date
                        },
                        success: function(data) {

                            if (data['respon_code'] === 201) {
                                $('#add-request').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                window.location.reload();
                            } else {
                                $('#add-request').modal('hide');
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

        function update_lv_req() {
            $("form[name='form-edit-request']").validate({
                rules: {
                    reason1: "required",
                    start_date1: {
                        required: true
                    },
                    end_date1: {
                        required: true
                    }
                },
                messages: {
                    reason1: "Please enter reason",
                    start_date1: "Please enter start date",
                    end_date1: "Please enter end date"
                },
                submitHandler: function(form) {
                    var id = $("#id1").val();
                    var reason = $('#reason1').val();
                    var start_date = $('#start_date1').val();
                    var end_date = $('#end_date1').val();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('leave_management_update_ad') }}",
                        dataType: 'json',
                        cache: false,
                        type: 'PUT',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                            reason: reason,
                            start_date: start_date,
                            end_date: end_date
                        },
                        success: function(data) {

                            if (data['respon_code'] === 200) {
                                $('#edit-lv-request').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                window.location.reload();
                            } else {
                                $('#edit-lv-request').modal('hide');
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

        function set_status(left_params, right_params) {
            if (left_params === null && right_params === null) {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'params is null',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else if (left_params !== null) {
                let id_req_lv = left_params;
                let id_exec = $('#user_id').val();
                let setack = $('#ack').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('leave_ok_update_ad') }}",
                    dataType: 'json',
                    cache: false,
                    type: 'PUT',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id_req_lv,
                        exec_id: id_exec,
                        status: setack
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

            } else if (right_params !== null) {
                let id_req_lv = right_params;
                let setrjct = $('#rjt').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('leave_not_update_ad') }}",
                    dataType: 'json',
                    cache: false,
                    type: 'PUT',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id_req_lv,
                        status: setrjct
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
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error on sometimes process',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    </script>
@endsection
