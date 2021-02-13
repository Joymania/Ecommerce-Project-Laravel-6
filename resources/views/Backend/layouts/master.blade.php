@include('Backend.layouts.header');

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
