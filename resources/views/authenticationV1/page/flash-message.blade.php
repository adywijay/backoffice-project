        @if ($message = Session::get('success'))
            <div role="alert" class="alert alert-success">{{ $message }}.</div>
        @endif

        @if ($message = Session::get('error'))
            <div role="alert" class="alert alert-danger">{{ $message }}.</div>
        @endif

        @if ($message = Session::get('warning'))
            <div role="alert" class="alert alert-warning">{{ $message }}.</div>
        @endif

        @if ($message = Session::get('info'))
            <div role="alert" class="alert alert-info">{{ $message }}.</div>
        @endif

        @if ($errors->any())
            <div role="alert" class="alert alert-danger">Please check the form below for
                errors.</div>
        @endif


        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 3000); // satuan detik milisecond 1 detik = 1000 ms
        </script>
