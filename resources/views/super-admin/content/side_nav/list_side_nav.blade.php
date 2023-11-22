@section('sidenav-content')
    <div class="sidebar px-4 py-4 py-md-5 me-0">
        <div class="d-flex flex-column h-100">
            <a href="{{ route('home_sa') }}" class="mb-0 brand-icon">
                <span class="logo-icon">
                    <img class="img-thumbnail" src="{{ asset('assets/images/corporate_id/logo1.png') }}" alt="profile">
                </span>
                <span class="logo-text">Super Admin</span>
            </a>
            <ul class="menu-list flex-grow-1 mt-3">
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" id="dashboard-page" href="javascript:void(0)">
                        <i class="icofont-home fs-5"></i> <span>Dashboard</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <ul class="sub-menu collapse show" id="dashboard-page">
                        <li><a class="ms-link active" href="javascript:void(0)" id="home_root"> <span>Home</span></a></li>
                        <li><a class="ms-link" href="javascript:void(0)" id="event_officer"><span>Event</span></a>
                        </li>
                    </ul>
                </li>
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#manage-task" href="#">
                        <i class="icofont-briefcase"></i><span>Projects</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="manage-task">
                        <li><a class="ms-link" href="javascript:void(0)" id="mapping_task"><span>Tasks</span></a></li>
                        <li><a class="ms-link" href="javascript:void(0)" id="list_task"><span>Task List</span></a></li>
                    </ul>
                </li>
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#employee-monitoring"
                        href="javascript:void(0)"><i class="icofont-users-alt-5"></i> <span>Employees</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <ul class="sub-menu collapse" id="employee-monitoring">
                        <li><a class="ms-link" href="javascript:void(0)" id="employe-indicators">
                                <span>Performance</span></a></li>
                        <li><a class="ms-link" href="javascript:void(0)" id="leave_management">
                                <span>Leave Request</span></a></li>
                    </ul>
                </li>
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#manage-users" href="javascript:void(0)"><i
                            class="icofont-ui-unlock"></i> <span>User Manage</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <ul class="sub-menu collapse" id="manage-users">
                        <li><a class="ms-link" href="javascript:void(0)" id="management_user"> <span>Members
                                    Profile</span></a>
                        </li>
                    </ul>
                </li>

                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#tools-officer" href="javascript:void(0)"><i
                            class="icofont-ui-office"></i> <span>Office</span> <span
                            class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <ul class="sub-menu collapse" id="tools-officer">
                        <li><a class="ms-link" href="javascript:void(0)" id="event_management"> <span>Event
                                    Management</span></a>
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

        $('#home_root').click(function() {
            window.location.replace('{{ route('home_sa') }}');
        });

        $('#event_officer').click(function() {
            window.location.replace('{{ route('event_officer_sa') }}');
        });

        $('#event_management').click(function() {
            window.location.replace('{{ route('get_event_management_sa') }}');
        });

        $('#leave_management').click(function() {
            window.location.replace('{{ route('leave_management_sa') }}');
        });

        $('#employe-indicators').click(function() {
            window.location.replace('{{ route('employe_perform_sa') }}');
        });

        $('#mapping_task').click(function() {
            window.location.replace('{{ route('mapping_task_sa') }}');
        });
        $('#list_task').click(function() {
            window.location.replace('{{ route('list_task_sa') }}');
        });
        $('#management_user').click(function() {
            window.location.replace('{{ route('manage_usr_sa') }}');
        });
    </script>
@endsection
