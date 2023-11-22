@section('sidenav-content')
    <div class="sidebar px-4 py-4 py-md-5 me-0">
        <div class="d-flex flex-column h-100">
            <a href="{{ route('home_em') }}" class="mb-0 brand-icon">
                <span class="logo-icon">
                    <img class="img-thumbnail" src="{{ asset('assets/images/corporate_id/logo1.png') }}" alt="profile">
                </span>
                <span class="logo-text">Employee</span>
            </a>
            <!-- Menu: main ul -->

            <ul class="menu-list flex-grow-1 mt-3">
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" id="home_employe" href="javascript:void(0)">
                        <i class="icofont-home fs-5"></i> <span>Dashboard</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                </li>
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#project-Components" href="#">
                        <i class="icofont-briefcase"></i><span>Projects</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="project-Components">
                        <li>
                            <a class="ms-link" href="javascript:void(0)" id="list_task"><span>Task List</span></a>
                        </li>
                    </ul>
                </li>

                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#tools-officer" href="javascript:void(0)"><i
                            class="icofont-ui-office"></i> <span>My Office</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <ul class="sub-menu collapse" id="tools-officer">
                        <li><a class="ms-link" href="javascript:void(0)" id="my-office-events"> <span>Event</span></a>
                        </li>
                        <li><a class="ms-link" href="javascript:void(0)" id="my-office-lvr"> <span>Leave
                                    Request</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <script type='text/javascript'>
        $('.collapsed').on('click', 'li', function() {
            $('.ms-link li.active').removeClass('active');
            $(this).addClass('active');
        });

        $('#home_employe').click(function() {
            window.location.replace('{{ route('home_em') }}');
        });

        $('#my-office-events').click(function() {
            window.location.replace('{{ route('list_event_em') }}');
        });

        $('#my-office-lvr').click(function() {
            window.location.replace('{{ route('get_lvr_officer_em') }}');
        });

        $('#list_task').click(function() {
            window.location.replace('{{ route('list_task_em') }}');
        });
    </script>
@endsection
