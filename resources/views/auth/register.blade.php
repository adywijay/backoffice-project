@extends('authenticationV1.page.call-fixed-page')
@section('list_body_auth')
    <div class="main p-2 py-3 p-xl-5">
        <div class="body d-flex p-0 p-xl-5">
            <div class="container-xxl">
                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                        <div style="max-width: 25rem;">
                            <div class="text-center mb-5">
                                <svg width="4rem" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                    <path
                                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path
                                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>
                            </div>
                            <div class="mb-5">
                                <h2 class="color-900 text-center">My-Task Let's Management Better</h2>
                            </div>
                            <!-- Image block -->
                            <div class="">
                                <img src="{{ asset('assets/images/login-img.svg') }}" alt="login-img">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                        <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-1 p-3 p-md-4" id="signup-form" method="post"
                                action="{{ route('register') }}">
                                @csrf
                                <div class="col-12 text-center mb-1 mb-lg-5">
                                    <h4>Create your account</h4>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label for="name" class="form-label">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="name"
                                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                                            placeholder="name@example.com" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                        <input type="email" id="email"
                                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="name@example.com">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">{{ __('Password') }}</label>
                                        <input type="password" id="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password"
                                            placeholder="8+ characters required">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label for="password-confirm"
                                            class="form-label">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control form-control-lg"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="8+ characters required">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I accept the <a href="#" title="Terms and Conditions"
                                                class="text-secondary">Terms and Conditions</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase">
                                        Sign-Up
                                    </button>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted">Already have an account? <a href="javascript:void(0)"
                                            title="Sign in" class="text-secondary" id="go-login">Sign in here</a></span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- End Row -->
            </div>
        </div>
    </div>
    <script type='text/javascript'>
        $('#go-login').click(function() {
            window.location.href = "{{ route('login') }}";
        });
        // $('#signup-form').on('submit', function(event) {
        //     event.preventDefault();
        //     var name = $('#name').val();
        //     var email = $('#email').val();
        //     var password = $('#password').val();

        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         url: "{{ route('register') }}", //Define Post URL
        //         dataType: 'json',
        //         type: "POST",
        //         data: {
        //             "_token": "{{ csrf_token() }}",
        //             name: name,
        //             email: email,
        //             password: password
        //         },
        //         success: function(data) {
        //             if (data['respon_code'] === 201) {
        //                 Swal.fire('Success!', data['message'], 'success');
        //                 setTimeout(function() {
        //                     window.location.href = "{{ route('login') }}";
        //                 }, 2500);
        //             } else {
        //                 Swal.fire('Error!', data['message'], 'warning');
        //                 setTimeout(function() {
        //                     location.reload();
        //                 }, 2500);
        //             }
        //         }
        //     })
        // })
    </script>
@endsection
