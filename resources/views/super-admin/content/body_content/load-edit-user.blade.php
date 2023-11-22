@extends('super-admin.page.call-fixed-page')
@section('body-content')
    <div class="row align-item-center">
        <div class="col-md-6 btnvh-center">
            <div class="card mb-3">
                <br>
                <div class="btnvh-center">
                    <i>
                        <h5 class="modal-title  fw-bold">User :: Details</h5>
                    </i>
                </div>
                <div class="card-body">
                    <form id="regis-form">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Username') }}</label>
                            <input type="text" class="form-control" id="name" required placeholder="your name"
                                value="{{ $data->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" required
                                placeholder="yourname@example.com" value="{{ $data->email }}">
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
                                    <input disabled type="datetime" class="form-control" name="email_verified_at"
                                        id="email_verified_at" value="{{ $data->email_verified_at }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="btnvh-center">
                    <button type="submit" id="regis-new-user" class="btn btn-primary" onclick="adduser()">Update
                    </button>
                    <a href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal">Back</a>
                </div>
                <br>
            </div>
        </div>
    </div><!-- Row end  -->
@endsection
