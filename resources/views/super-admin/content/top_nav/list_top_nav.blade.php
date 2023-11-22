@section('topnav-content')
    <nav class="navbar py-4">
        <div class="container">
            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                <div class="d-flex">
                    <span class="badge bg-dark" id="dateTime"></span>
                </div>
                <div class="dropdown notifications zindex-popover">
                    <a id="refresh-page" class="nav-link dropdown-toggle pulse" href="javascript:void(0)">
                        <i class="icofont-refresh fs-5"></i>
                        <span class="pulse-ring"></span>
                    </a>
                </div>
                <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                    <div class="u-info me-2">
                        <p class="mb-0 text-end line-height-sm "><span
                                class="font-weight-bold">{{ Auth::user()->name }}</span>
                        </p>
                        <small>{{ Auth::user()->role }}</small>
                    </div>
                    <a class="nav-link dropdown-toggle pulse p-0" href="#" id="detail_action1" role="button"
                        data-bs-toggle="dropdown" data-bs-display="static">
                        <img class="avatar lg rounded-circle img-thumbnail"
                            src="{{ URL::asset('assets/images/profile_av.png') }}" alt="profile">
                    </a>
                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0"
                        aria-labelledby="detail_action1">
                        <div class="card border-0 w280">
                            <div class="card-body pb-0">
                                <div class="d-flex py-1">
                                    <img class="avatar rounded-circle"
                                        src="{{ URL::asset('assets/images/profile_av.png') }}" alt="profile">
                                    <div class="flex-fill ms-3">
                                        <p class="mb-0"><span class="font-weight-bold">{{ Auth::user()->name }}</span></p>
                                        <small class="">{{ Auth::user()->email }}</small>
                                    </div>
                                </div>

                                <div>
                                    <hr class="dropdown-divider border-dark">
                                </div>
                            </div>
                            <div class="list-group m-2 ">
                                <form id="logout-form-root">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-primary list-group-item list-group-item-action border-0">
                                        <i class="icofont-logout fs-6 me-3"></i> {{ __('Logout') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- menu toggler -->
            <button class="navbar-toggler p-0 border-0 menu-toggle order-3 ms-1" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainHeader">
                <span class="fa fa-bars"></span>
            </button>

            <!-- main menu Search-->
            <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                <div class="input-group flex-nowrap input-group-lg">
                </div>
            </div>

        </div>
    </nav>
    <script type='text/javascript'>
        setInterval(() => $("#dateTime").text(new Date().toLocaleString()), 1000);
        $('#refresh-page').click(function() {
            location.reload();
        });

        $('#logout-form-root').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('logout') }}",
                dataType: 'json',
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function() {
                    window.location.href = "{{ route('login') }}";
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Logout successfull',
                        showConfirmButton: false,
                        timer: 5000
                    });
                }
            })
        })
    </script>
@endsection
