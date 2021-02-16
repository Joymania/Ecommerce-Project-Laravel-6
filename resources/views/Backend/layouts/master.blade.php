@include('Backend.layouts.header');
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('Backend') }}/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('Backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@include('Backend.layouts.nav');

@include('Backend.layouts.sidebar');

@yield('content');

@if (session()->has('success'))
    <script type="text/javascript">
        $(function(){
            $.notify("{{ session()->get('success') }}",{globalPosition:'top right',className:'success'});
        });
    </script>
@endif
@if (session()->has('error'))
    <script type="text/javascript">
        $(function(){
            $.notify("{{ session()->get('error') }}",{globalPosition:'top right',className:'error'});
        });
    </script>
@endif

@include('Backend.layouts.footer');
