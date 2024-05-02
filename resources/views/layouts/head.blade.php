<title>@yield('title')</title>

{{-- CSS Bootstrap CDN --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- PreLoader -->
<link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}">

<!-- Preloader -->
<div id="preloader" class="preloader flex-column justify-content-center align-items-center">
    <div class="pre-center">
        <div class="pre-ring"></div>
        <span><img src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="Logo" height="100" width="100"></span>
    </div>
</div>
<script>
    // This is the JavaScript that will fade out the preloader
    window.addEventListener('load', function() {
        var preloader = document.getElementById('preloader');
        // Change the opacity to 0 to start the fade-out
        preloader.style.opacity = '0';
        // After the transition is complete, hide the preloader
        preloader.addEventListener('transitionend', function() {
            preloader.style.display = 'none';
        });
    });
</script>
</div>
<!-- Font Awesome -->
{{--   this line below will converted  --}}
{{-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css"> --}}
{{-- to --}}
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
{{-- OR --}}
{{-- <link rel="stylesheet" href="{{ URL::asset('images/slides/2.jpg') }}"> --}}
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
{{-- <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> --}}
<link rel="stylesheet"
    href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
{{-- <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
{{-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
{{-- <link rel="stylesheet" href="dist/css/adminlte.min.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
{{-- <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
{{-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
{{-- <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!-- Bootstrap 4 RTL -->
<link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
<!-- Custom style for RTL -->
{{-- <link rel="stylesheet" href="dist/css/custom.css"> --}}
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
@yield('css')
