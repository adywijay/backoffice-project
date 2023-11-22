@extends('super-admin.page.call-fixed-page')
@section('body-content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">User :: Management</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#add-user-regis"><i class="icofont-plus-circle me-2 fs-6"></i>add
                                    registrations</button>
                            </div>
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
                                        <th>No</th>
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
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($get as $list)
                                        <tr>
                                            <td>{{ $no++ }}</td>
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
                                                <div class="btn-group">
                                                    <a href="javascript:void(0)" class="btn btn-outline-info"
                                                        onclick="get_details({{ $list->id }})"><i
                                                            class="icofont-edit me-2 fs-6"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-outline-success"
                                                        onclick="getbyuser({{ $list->id }})"><i
                                                            class="icofont-key me-2 fs-6"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-outline-danger"
                                                        onclick="deluser({{ $list->id }})"><i
                                                            class="icofont-ui-delete me-2 fs-6"></i></a>
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


    <div class="modal fade" id="add-user-regis" tabindex="-1" aria-labelledby="add-user-regis" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm modal-dialog-scrollable">
            <div class="modal-content">
                <form id="regis-form-user" name="regis-form-user">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="addUserLabel">form registrations</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Username') }}</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="yourname@example.com">
                            <span class="error" id="is-exist"></span>
                        </div>
                        <div class="mb-3">
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="role" class="form-label">{{ __('Role') }}</label>
                                    <select class="form-select" name="role" id="role">
                                        <option value="new_register">Default</option>
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
                            <input disabled type="password" class="form-control" name="password" id="password"
                                placeholder="your passw" value="{{ $get_key }}">
                            <br>
                            <input type="checkbox" id="show-passw" />
                            <span for="show-passw">Show</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btnvh-center">
                            <button type="submit" id="regis-new-user" class="btn btn-primary" onclick="adduser()">Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="reset-modals" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered modal-sm modal-dialog-scrollable">
            <div class="modal-content">
                <form id="restpw-form" name="restpw-form">
                    @method('POST')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="respasw-md1">Reset</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div hidden class="mb-3">
                            <label for="reset-id" class="form-label">{{ __('Accounts-Id') }}</label>
                            <input type="number" class="form-control" id="reset-id" name="reset-id">
                        </div>
                        <div class="mb-3">
                            <label for="uname" class="form-label">{{ __('Username') }}</label>
                            <input disabled type="text" class="form-control" id="uname" name="uname">
                        </div>
                        <div class="mb-3">
                            <label for="req_pass_rest" class="form-label">{{ __('Your Request Passw') }}</label>
                            <input type="password" class="form-control" name="req_pass_rest" id="req_pass_rest" required
                                placeholder="*********************" minlength="8" maxlength="10">
                            <br>
                            <input type="checkbox" id="show-x" />
                            <span for="show-x">Show</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btnvh-center">
                            <button type="button" class="btn btn-primary" onclick="genKey()">
                                <i class="icofont-ui-password" onclick="genKey()"></i>
                            </button>
                            <button type="submit" id="do-resetpw" class="btn btn-primary" onclick="restpassw()">Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-users" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm modal-dialog-scrollable">
            <div class="modal-content">
                <form id="details-view-edit" name="details-view-edit">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="edit-users">View users</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input hidden type="text" name="id1" id="id1">
                        <div class="mb-3">
                            <label for="name1" class="form-label">Username</label>
                            <input type="text" class="form-control" name="name1" id="name1"
                                placeholder="your name">
                        </div>
                        <div class="mb-3">
                            <label for="email1" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email1" name="email1"
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
                                    <input disabled type="datetime" class="form-control" name="email_verified_at1"
                                        id="email_verified_at1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btnvh-center">
                            <button type="submit" id="regis-edit-user" class="btn btn-primary"
                                onclick="send_update()">Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type='text/javascript'>
        $(document).ready(function() {
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRFToken': csrfToken
                }
            });
            $('#view-user-reg')
                .addClass('nowrap')
                .dataTable({
                    responsive: true,
                    columnDefs: [{
                        targets: [-1, -3],
                        className: 'dt-body-right'
                    }]
                });
            $('#email').on('input', function() {
                let email = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('exist_mail') }}",
                    dataType: 'json',
                    cache: false,
                    type: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        email: email

                    },
                    success: function(data) {
                        if (data.status === 'exists') {
                            $('#is-exist').html(data.status);
                        } else {
                            $('#is-exist').html(data.status);
                        }
                    }
                });
            });

            $('#show-passw').on('change', function() {
                let passwordInput = $('#password');
                let passwordFieldType = (this.checked) ? 'text' : 'password';
                passwordInput.attr('type', passwordFieldType);
            });
            $('#show-x').on('change', function() {
                let passwordInput = $('#req_pass_rest');
                let passwordFieldType = (this.checked) ? 'text' : 'password';
                passwordInput.attr('type', passwordFieldType);
            });
        });

        function genKey() {
            let keysec = '{{ $init }}';
            if ($('#req_pass_rest').val() !== '') {
                setTimeout(function() {
                    $('#req_pass_rest').trigger('reset');
                    $('#req_pass_rest').val(keysec);
                }, 100);
            }
            $('#req_pass_rest').val(keysec);
        }

        function getbyuser(id) {
            var id = id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "manage_user/getid/" + id,
                dataType: 'json',
                cache: false,
                type: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    $('#reset-modals').modal('show');
                    $('#reset-id').val(data.id);
                    $('#uname').val(data.name);
                }
            });
        }

        function send_update() {
            $("form[name='details-view-edit']").validate({
                rules: {
                    name1: "required",
                    email1: "required",
                    role1: "required"
                },
                messages: {
                    name1: "Please enter  username",
                    email1: "Please enter email",
                    role1: "Please enter role"
                },
                submitHandler: function(form) {
                    var id = $('#id1').val();
                    var name = $('#name1').val();
                    var email = $('#email1').val();
                    var role = $('#role1').val();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('update_user_sa') }}",
                        dataType: 'json',
                        cache: false,
                        type: 'PUT',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                            name: name,
                            email: email,
                            role: role
                        },
                        success: function(data) {

                            if (data['respon_code'] === 200) {
                                $('#edit-users').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                location.reload();
                            } else {
                                $('#edit-users').modal('hide');;
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
            });

        }


        function restpassw() {
            $("form[name='restpw-form']").validate({
                rules: {
                    name: "required",
                    req_pass_rest: {
                        required: true,
                        minlength: 8,
                        maxlength: 10
                    }
                },
                messages: {
                    name: "Please enter your username",
                    req_pass_rest: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 8 characters long"
                    }
                },
                submitHandler: function(form) {
                    let id = $('#reset-id').val();
                    let name = $('#uname').val();
                    let req_passw = $('#req_pass_rest').val();
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
                            name: name,
                            password: req_passw
                        },
                        success: function(data) {
                            if (data['respon_code'] === 200) {
                                $('#reset-modals').modal('hide');
                                $('#req_pass_rest').trigger('reset');
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                location.reload();
                            } else {
                                $('#reset-modals').modal('hide');
                                $('#req_pass_rest').trigger('reset');
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
            });
        }


        function get_details(id) {
            var id = id;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "manage_user/getid/" + id,
                dataType: 'json',
                cache: false,
                type: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    $('#edit-users').modal('show');
                    $('#id1').val(data.id);
                    $('#name1').val(data.name);
                    $('#email1').val(data.email);
                    $('#role1').val(data.role);
                    $('#email_verified_at1').val(data.email_verified_at);
                }
            });
        }

        function adduser() {
            $("form[name='regis-form-user']").validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    },
                    role: "required"
                },
                messages: {
                    name: "Please enter your username",
                    email: "Please enter your email",
                    password: {
                        required: "Please provide a password"
                    },
                    role: "Please change role"
                },
                submitHandler: function(form) {
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

                            if (data['respon_code'] === 201) {
                                $('#add-user-regis').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: data['message'],
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                location.reload();
                            } else {
                                $('#add-user-regis').modal('hide');
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
                        url: "{{ url('super-admin/manage_user/deluser') }}" + '/' +
                            id, //Define Post URL
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
