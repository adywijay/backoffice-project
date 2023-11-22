@extends('employe.page.call-fixed-page')
@section('body-content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl" id="fresh-container">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h6 class="fw-bold py-3 mb-0">
                            List :: Assignment &nbsp;
                            <span class="badge bg-danger text-end mt-2">{{ count($get) }}</span>
                        </h6>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="task-list" class="table table-hover align-middle mb-0" style="width:100%">
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
            </div><!-- Row End -->
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
                    <form id="task-form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="name">Project Name</label>
                            <select class="form-select" aria-label="Default select Project Category" name="name"
                                id="name">
                                <option disabled selected></option>
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
                            <select class="form-select" aria-label="Default select Project Category" name="category"
                                id="category">
                                <option disabled selected></option>
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
                            <button type="submit" id="submit" class="btn btn-primary" onclick="addtask()">Create
                            </button>
                            <a href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        </div>
                    </div>
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
                    <form id="edit-form">
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
        // project data table
        $(document).ready(function() {
            $('#task-list').addClass('nowrap').dataTable({
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
                url: "{{ route('get_name_emp') }}",
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
                url: "{{ route('task_update_em') }}",
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
    </script>
@endsection
