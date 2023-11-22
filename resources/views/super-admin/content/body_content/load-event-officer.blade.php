@extends('super-admin.page.call-fixed-page')
@section('body-content')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                </div>
            </div>
            <div class="row clearfix g-3">
                <div class="col-lg-12 col-md-12 ">
                    <div class="card">
                        <div id='evoCalendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#evoCalendar').evoCalendar({
                sidebarToggler: true,
                sidebarDisplayDefault: false,
                todayHighlight: true,
            });
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('get_event_officer_sa') }}",
                type: 'GET',
                cache: false,
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    response.forEach(function(event) {
                        let startDate = moment(event.start_date).format('YYYY-MM-DD');
                        let endDate = moment(event.end_date).format('YYYY-MM-DD');
                        let data_event = {
                            id: event.id,
                            name: event.title,
                            date: startDate,
                            endDate: endDate,
                            description: event.description,
                            type: event.type,
                            color: event.color
                        };
                        $('#evoCalendar').evoCalendar('addCalendarEvent', data_event);
                        $('#evoCalendar').evoCalendar('getActiveEvents');

                    });
                }
            });
        });
    </script>
@endsection
