@extends('super-admin.page.call-fixed-page')
@section('body-content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl" id="fresh-container">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Registrations :: Usr</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal"
                                data-bs-target="#user-add"><i class="icofont-plus-circle me-2 fs-6"></i>Add Users</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table id="view-user-reg" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Lasted</th>
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
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->email }}</td>
                                            <td>
                                                @if ($list->role == 'super_admin')
                                                    <span class="badge bg-danger">{{ __($list->role) }}</span>
                                                @elseif ($list->role == 'admin')
                                                    <span class="badge bg-warning">{{ __($list->role) }}</span>
                                                @elseif ($list->role == 'employe')
                                                    <span class="badge bg-success">{{ __($list->role) }}</span>
                                                @else
                                                    <span class="badge bg-dark">{{ __($list->role) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $list->updated_at }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">

                                                    <button id="edit-user" type="submit" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal" data-bs-target="#edit-users"
                                                        onclick="get_for_update()">
                                                        <i class="icofont-edit text-success"></i>
                                                    </button>
                                                    <button id="restpw" type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal" data-bs-target="#reset-pass"
                                                        onclick="getbyuser({{ $list->id }})">
                                                        <i class="icofont-key text-primary"></i>
                                                    </button>
                                                    <button class="btn btn-outline-secondary deleterow"
                                                        onclick="deluser({{ $list->id }})"><i
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
            </div><!-- Row End -->
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
                            <input type="email" class="form-control" placeholder="Email address" id="exampleInputEmail1"
                                aria-describedby="exampleInputEmail1">
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

    <!-- Add Tickit-->
    {{-- <div class="modal fade" id="user-add" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="leaveaddLabel">Add Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="regis-form">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Username') }}</label>
                            <input type="text" class="form-control" id="name" required placeholder="your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" required
                                placeholder="yourname@example.com">
                        </div>
                        <div class="deadline-form">
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="role" class="form-label">{{ __('Role') }}</label>
                                    <select class="form-select" name="role" id="role">
                                        <option disable value="new_register">Default</option>
                                        <option value="super_admin">Super Admin / Root</option>
                                        <option value="admin">Admin</option>
                                        <option value="employe">Employe</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="email_verified_at"
                                        class="form-label">{{ __('Forced Email Verify') }}</label>
                                    <input readonly type="datetime" class="form-control" name="email_verified_at"
                                        id="email_verified_at" value="{{ $now }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Standart Key') }}</label>
                            <input disabled type="text" class="form-control" name="password" id="password" required
                                placeholder="your passw" value="{{ $get_key }}">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="btnvh-center">
                        <button type="submit" id="regis-new-user" class="btn btn-primary" onclick="adduser()">Save
                        </button>
                        <a href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Edit Tickit-->
    <div class="modal fade" id="edit-users" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="btnvh-center">
                        <h5 class="modal-title  fw-bold">View :: Register</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="details-view-edit">
                        @csrf
                        <input type="number" name="id1" id="id1">
                        <div class="mb-3">
                            <label for="name1" class="form-label">Username</label>
                            <input type="text" class="form-control" name="name1" id="name1" required
                                placeholder="your name">
                        </div>
                        <div class="mb-3">
                            <label for="email1" class="form-label">{{ __('Email') }}</label>
                            <input type="email1" class="form-control" id="email1" required
                                placeholder="yourname@example.com">
                        </div>
                        <div class="deadline-form">
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="role1" class="form-label">{{ __('Role') }}</label>
                                    <select class="form-select" name="role1" id="role1">
                                        <option disable value="new_register">Default</option>
                                        <option value="super_admin">Super Admin / Root</option>
                                        <option value="admin">Admin</option>
                                        <option value="employe">Employe</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="email_verified_at1"
                                        class="form-label">{{ __('Forced Email Verify') }}</label>
                                    <input readonly type="datetime" class="form-control" name="email_verified_at1"
                                        id="email_verified_at1">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="btnvh-center">
                        <button type="submit" id="regis-edit-user" class="btn btn-primary" onclick="send_update()">Save
                        </button>
                        <a href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reset Passw-->
    <div class="modal fade" id="reset-pass" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="btnvh-center">
                        <h5 class="modal-title  fw-bold">Password :: Manual Reset</h5>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="reset-pass">
                        @csrf
                        <input type="number" name="id-user" id="id-user">
                        <div class="mb-3">
                            <label for="password-reset" class="form-label">{{ __('Your Request Passw') }}</label>
                            <input type="text" class="form-control" name="password-reset" id="password-reset"
                                required placeholder="*********************" minlength="8" maxlength="10">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="btnvh-center">
                        <button type="submit" class="btn btn-primary" onclick="restpassw()">Submit
                        </button>
                        <button type="button" class="btn btn-primary" onclick="genKey()">
                            <i class="icofont-ui-password" onclick="genKey()"></i>
                        </button>
                        <a href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'>
        // project data table
        $(document).ready(function() {
            $('#view-user-reg')
                .addClass('nowrap')
                .dataTable({
                    responsive: true,
                    columnDefs: [{
                        targets: [-1, -3],
                        className: 'dt-body-right'
                    }]
                });
        });

        function genKey() {
            let keysec = '{{ $get_key }}';
            if ($('#password-reset').val() !== '') {
                setTimeout(function() {
                    $('#password-reset').trigger('reset');
                    $('#password-reset').val(keysec);
                }, 100);
            }
            $('#password-reset').val(keysec);
        }

        function getbyuser(id) {
            $('#reset-pass').modal('show');
            $('#id-user').val(id);
        }

        function get_for_update() {
            // $.get('manage_user/getid/' + id, function(data) {
            //     $('#user-detail').modal('show');
            //     $('#id1').val(data.id);
            //     $('#name1').val(data.name);
            //     $('#email1').val(data.email);
            //     $('#role1').val(data.role);
            //     $('#email_verified_at1').val(data.email_verified_at);
            // })
        }

        function restpassw() {
            var id = $('#id-user').val();
            var req_passw = $('#password-reset').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('reqreset_sa') }}",
                dataType: 'json',
                cache: false,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    password: req_passw
                },
                success: function(data) {
                    console.log(data);

                    if (data['respon_code'] === 200) {
                        $('#reset-pass').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: data['message'],
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.reload();
                    } else {
                        $('#reset-pass').modal('hide');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data['message'],
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.reload();
                    }
                }
            });

        }

        function adduser() {

            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var role = $('#role').val();
            var email_verified_at = $('#email_verified_at').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('adduser_sa') }}",
                dataType: 'json',
                cache: false,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    email: email,
                    password: password,
                    role: role,
                    email_verified_at: email_verified_at
                },
                success: function(data) {
                    //console.log(data);

                    if (data['respon_code'] === 201) {
                        $('#user-add').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: data['message'],
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.reload();
                    } else {
                        $('#user-add').modal('hide');
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data['message'],
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.reload();
                    }
                }
            });
        }

        function deluser(id) {
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
                        url: "{{ url('super-admin/manage_user/deluser') }}" + '/' + id, //Define Post URL
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
                                location.reload();
                            } else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'error',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                location.reload();
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            });

        }
    </script>
@endsection
