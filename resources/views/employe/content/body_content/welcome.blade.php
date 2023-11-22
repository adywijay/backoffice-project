@extends('employe.page.call-fixed-page')
@section('body-content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <div class="card bg-secondary mb-3">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold text-white">Senin</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d1 as $data1)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data1->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                onclick="view_task_by({{ $data1->id_task }})">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card bg-success mb-3">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold text-white">Selasa</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d2 as $data2)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data2->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                onclick="view_task_by({{ $data2->id_task }})">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card bg-danger mb-3">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold text-white">Rabu</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d3 as $data3)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data3->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                onclick="view_task_by({{ $data3->id_task }})">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card bg-warning mb-3">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold text-white">Kamis</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d4 as $data4)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data4->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                onclick="view_task_by({{ $data4->id_task }})">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card bg-info mb-3">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold text-white">Jum'at</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d5 as $data5)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data5->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                onclick="view_task_by({{ $data5->id_task }})">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card bg-primary mb-3">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold text-white">Sabtu</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d6 as $data6)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data6->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-light"
                                                onclick="view_task_by({{ $data6->id_task }})">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="pre-detail-task" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="btnvh-center">
                                <h5 class="modal-title  fw-bold">View</h5>
                            </div>
                        </div>
                        <div class="modal-body">
                            <form id="edit-form">
                                @csrf
                                <input hidden type="number" name="id1" id="id1">
                                <div class="mb-3">
                                    <label for="name1" class="form-label">Project Name</label>
                                    <input disabled class="form-control" type="text" id="name1" name="name1">
                                </div>
                                <div class="mb-3">
                                    <label for="category1" class="form-label">Task Category</label>
                                    <input disabled class="form-control" type="text" id="category1" name="category1">
                                </div>
                                <div class="mb-3">
                                    <label for="link1" class="form-label">Hyperlink Assignment</label>
                                    <input disabled class="form-control" type="text" id="link1" name="link1">
                                </div>
                                <div class="deadline-form mb-3">
                                    <form>
                                        <div class="row">
                                            <div class="col">
                                                <label for="start_date1" class="form-label">Task Start Date</label>
                                                <input disabled type="date" class="form-control" name="start_date1"
                                                    id="start_date1">
                                            </div>
                                            <div class="col">
                                                <label for="end_date1" class="form-label">Task End Date</label>
                                                <input disabled type="date" class="form-control" name="end_date1"
                                                    id="end_date1">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-sm">
                                        <label class="form-label">Status</label>
                                        <input disabled class="form-control" type="text" id="status1"
                                            name="status1">
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <div class="btnvh-center"><a href="javascript:void(0)" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'>
        function view_task_by(id) {
            var id = id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "employee/assignment/getby/" + id,
                dataType: 'json',
                cache: false,
                type: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    $('#pre-detail-task').modal('show');
                    $('#name1').val(data.name)
                    $('#category1').val(data.category);
                    $('#start_date1').val(data.start_date);
                    $('#end_date1').val(data.end_date);
                    $('#link1').val(data.link);
                    $('#status1').val(data.status);
                }
            });
        }
    </script>
@endsection
