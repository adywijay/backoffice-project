@extends('admin.page.call-fixed-page')
@section('body-content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl" id="fresh-container">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Event :: Management</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#add-event"><i class="icofont-plus-circle me-2 fs-6"></i>Add Event</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="task-list" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Color Labeled</th>
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
                                    @php
                                        $init = 1;
                                    @endphp
                                    @foreach ($data as $list)
                                        <tr>
                                            <td>{{ $init++ }}</td>
                                            <td>{{ $list->title }}</td>
                                            <td>
                                                @if ($list->type == 'event')
                                                    <span class="badge bg-success">{{ __($list->type) }}</span>
                                                @else
                                                    <span class="badge bg-danger">{{ __($list->type) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $list->start_date }}</td>
                                            <td>{{ $list->end_date }}</td>
                                            <td>{{ $list->color ? $list->color : 'Not Included' }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a href="javascript:void(0)"
                                                        onclick="call_view_edit_event({{ $list->id }})"
                                                        class="btn btn-outline-secondary">
                                                        <i class="icofont-edit text-success"></i>
                                                    </a>
                                                    <button class="btn btn-outline-secondary deleterow"
                                                        onclick="delevent({{ $list->id }})"><i
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

    <div class="modal fade" id="add-event" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <form id="form-add-event" name="form-add-event">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="eventaddLabel">Add Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descriptions</label>
                            <input type="text" class="form-control" id="description" name="description">
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
                        <div class="deadline-form">
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="type" class="form-label">Type</label>
                                    <select class="form-select" name="type" id="type">
                                        <option readonly></option>
                                        <option value="event">Event</option>
                                        <option value="holyday">Holyday</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="color" class="form-label">Color (Optionals)</label>
                                    <input type="text" class="form-control" id="color" name="color"
                                        placeholder="Color code hexa">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btnvh-center">
                            <button type="submit" id="do-event" class="btn btn-primary"
                                onclick="add_event()">Add</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="edit-event" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <form id="form-edit-event" name="form-edit-event">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="eventaddLabel">Details Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input hidden type="number" name="id1" id="id1">
                        <div class="mb-3">
                            <label for="title1" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title1" name="title1">
                        </div>
                        <div class="mb-3">
                            <label for="description1" class="form-label">Descriptions</label>
                            <input type="text" class="form-control" id="description1" name="description1">
                        </div>
                        <div class="deadline-form">
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="start_date" class="form-label">Event Start Date</label>
                                    <input type="date" class="form-control" id="start_date1" name="start_date1">
                                </div>
                                <div class="col">
                                    <label for="end_date" class="form-label">Event End Date</label>
                                    <input type="date" class="form-control" id="end_date1" name="end_date1">
                                </div>
                            </div>
                        </div>
                        <div class="deadline-form">
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="type" class="form-label">Type</label>
                                    <select class="form-select" name="type1" id="type1">
                                        <option></option>
                                        <option value="event">Event</option>
                                        <option value="holyday">Holyday</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="color" class="form-label">Color (Optionals)</label>
                                    <input type="text" class="form-control" id="color1" name="color1"
                                        placeholder="Color code hexa">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btnvh-center">
                            <button type="submit" id="do-event" class="btn btn-primary"
                                onclick="update_event()">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type='text/javascript'>
        $(document).ready(function() {

            $('#task-list').addClass('nowrap').dataTable({
                responsive: true,
                columnDefs: [{
                    targets: [-1, -3],
                    className: 'dt-body-right'
                }]
            });
        });

        function call_view_edit_event(id) {
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
                    $('#edit-event').modal('show');
                    $("#id1").val(data.id);
                    $('#title1').val(data.title)
                    $('#description1').val(data.description);
                    $('#start_date1').val(data.start_date);
                    $('#end_date1').val(data.end_date);
                    $('#type1').val(data.type);
                    $('#color1').val(data.color);
                }
            });
        }

        function delevent(id) {
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
                        url: "{{ url('admin/event/delete/') }}" + '/' + id, //Define Post URL
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

        function add_event() {
            $("form[name='form-add-event']").validate({
                rules: {
                    title: "required",
                    description: "required",
                    start_date: {
                        required: true
                    },
                    end_date: {
                        required: true
                    },
                    type: "required"
                },
                messages: {
                    title: "Please enter event title",
                    description: "Please enter event descriptions",
                    start_date: "Please enter start date",
                    end_date: "Please enter end date",
                    type: "Please enter event type",
                },
                submitHandler: function(form) {
                    var title = $('#title').val();
                    var description = $('#description').val();
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();
                    var type = $('#type').val();
                    var color = $('#color').val();


                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('new_event_officer_ad') }}",
                        dataType: 'json',
                        cache: false,
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            title: title,
                            description: description,
                            start_date: start_date,
                            end_date: end_date,
                            type: type,
                            color: color
                        },
                        success: function(data) {

                            if (data['respon_code'] === 201) {
                                $('#add-event').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                window.location.reload();
                            } else {
                                $('#add-event').modal('hide');
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

        function update_event() {
            $("form[name='form-edit-event']").validate({
                rules: {
                    title: "required",
                    description: "required",
                    start_date: {
                        required: true
                    },
                    end_date: {
                        required: true
                    },
                    type: "required"
                },
                messages: {
                    title: "Please enter event title",
                    description: "Please enter event descriptions",
                    start_date: "Please enter start date",
                    end_date: "Please enter end date",
                    type: "Please enter event type",
                },
                submitHandler: function(form) {
                    var id = $("#id1").val();
                    var title = $('#title1').val()
                    var description = $('#description1').val();
                    var start_date = $('#start_date1').val();
                    var end_date = $('#end_date1').val();
                    var type = $('#type1').val();
                    var color = $('#color1').val();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('event_update_ad') }}",
                        dataType: 'json',
                        cache: false,
                        type: 'PUT',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                            title: title,
                            description: description,
                            start_date: start_date,
                            end_date: end_date,
                            type: type,
                            color: color
                        },
                        success: function(data) {

                            if (data['respon_code'] === 200) {
                                $('#edit-event').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                window.location.reload();
                            } else {
                                $('#edit-event').modal('hide');
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
