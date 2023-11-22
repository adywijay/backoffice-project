@extends('admin.page.call-fixed-page')
@section('body-content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold ">Senin</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d1 as $data1)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data1->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="view_task_by({{ $data1->id_task }})">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold ">Selasa</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d2 as $data2)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data2->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="view_task_by({{ $data2->id_task }})">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold ">Rabu</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d3 as $data3)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data3->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="view_task_by({{ $data3->id_task }})">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold ">Kamis</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d4 as $data4)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data4->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="view_task_by({{ $data4->id_task }})">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold ">Jum'at</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d5 as $data5)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data5->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary"
                                                onclick="view_task_by({{ $data5->id_task }})">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-header text-center">
                            <h6 class="mb-0 fw-bold ">Sabtu</h6>
                        </div>
                        <div class="card-body mem-list" style="min-height:200px">
                            @foreach ($d6 as $data6)
                                @csrf
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>{{ $data6->user_name }}&nbsp; got new Task</strong>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-primary"
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
        <br>
        <div class="container-xxl">
            <div class="col-md-12">
                <div class="card light-danger-bg">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <div class="btnvh-center">
                            <h6 class="mb-0 fw-bold ">Top Performers</h6>
                        </div>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-2 btnvh-center">
                                <div class="d-flex  justify-content-between text-center">
                                    <div class="">
                                        <h3 class="fw-bold">
                                            <span class="badge bg-danger">
                                                {{ $count_all }}
                                            </span>
                                        </h3>
                                        <span class="small">Total All Task</span>
                                    </div>
                                    <div class="">
                                        <h3 class="fw-bold">
                                            <span class="badge bg-success">
                                                {{ $count_complete }}
                                            </span>
                                        </h3>
                                        <span class="small">Task Completed</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-10">
                                <div
                                    class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-6 row-deck top-perfomer">
                                    @foreach ($data as $list)
                                        <div class="col">
                                            <div class="card shadow">
                                                <div
                                                    class="card-body text-center d-flex flex-column justify-content-center">
                                                    <img class="avatar lg rounded-circle img-thumbnail mx-auto"
                                                        src="{{ asset('assets/images/lg/user.png') }}" alt="profile">
                                                    <h6 class="fw-bold my-2 small-14">{{ $list->name }}</h6>
                                                    <h3 class="fw-bold my-2 small-14">
                                                        {{ $list->total_done ? $list->total_done : 0 }}/{{ $list->total_assignment ? $list->total_assignment : 0 }}
                                                    </h3>
                                                    <h4 class="fw-bold text-primary fs-3">
                                                        <span class="badge bg-secondary">
                                                            @php
                                                                if ($list->kpi == floor($list->kpi)) {
                                                                    $angkaFormatted = number_format($list->kpi, 0);
                                                                } else {
                                                                    $angkaFormatted = number_format($list->kpi, 1);
                                                                }
                                                                echo $angkaFormatted;
                                                            @endphp
                                                            %
                                                        </span>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
                url: "admin/assignment/getby/" + id,
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
