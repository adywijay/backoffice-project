@extends('admin.page.call-fixed-page')
@section('body-content')
    <div class="body d-flex py-lg-3 py-md-2">
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
@endsection
