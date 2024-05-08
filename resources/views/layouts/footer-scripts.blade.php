<!-- jQuery -->
{{--   this line below will converted  --}}
{{-- <script src="plugins/jquery/jquery.min.js"></script> --}}
{{-- to --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
{{-- <script src="plugins/jquery-ui/jquery-ui.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
{{-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
{{-- <script src="plugins/chart.js/Chart.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
{{-- <script src="plugins/sparklines/sparkline.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
{{-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
{{-- <script src="plugins/jqvmap/maps/jquery.vmap.world.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<!-- jQuery Knob Chart -->
{{-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
{{-- <script src="plugins/moment/moment.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/moment/moment.min.js') }}"></script>
{{-- <script src="plugins/daterangepicker/daterangepicker.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> --}}
<script type="text/javascript"
    src="{{ URL::asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
{{-- <script src="plugins/summernote/summernote-bs4.min.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
{{-- <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> --}}
<script type="text/javascript"
    src="{{ URL::asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
{{-- <script src="dist/js/adminlte.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="dist/js/pages/dashboard.js"></script> --}}
<script type="text/javascript" src="{{ URL::asset('assets/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="dist/js/demo.js"></script> --}}
{{-- <script type="text/javascript" src="{{ URL::asset('assets/js/demo.js') }}"></script> --}}

{{-- JavaScript Bootstrap CDN --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

{{-- Preloader  --}}
<script>
    // After 0.5 seconds, add the 'loaded' class to the body
    setTimeout(function() {
        document.body.classList.add('loaded');
    }, 500);
</script>
{{-- Fullscreen on headerbar script --}}
<script>
    let myDocument = document.documentElement;
    let fullscreen1 = document.getElementById("fullscreen1");

    fullscreen1.addEventListener("click", () => {
        if (fullscreen1.textContent == "ملء الشاشة") {
            if (myDocument.requestFullscreen) {
                myDocument.requestFullscreen();
            } else if (myDocument.msRequestFullscreen) {
                myDocument.msRequestFullscreen();
            } else if (myDocument.mozRequestFullScreen) {
                myDocument.mozRequestFullScreen();
            } else if (myDocument.webkitRequestFullscreen) {
                myDocument.webkitRequestFullscreen();
            }
            fullscreen1.textContent = "إغلاق ملء الشاشة";
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msexitFullscreen) {
                document.msexitFullscreen();
            } else if (document.mozexitFullscreen) {
                document.mozexitFullscreen();
            } else if (document.webkitexitFullscreen) {
                document.webkitexitFullscreen();
            }

            fullscreen1.textContent = "ملء الشاشة";
        }
    });
</script>
{{-- full screen 2 --}}
<script>
    const elem = document.documentElement;

    function openFullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) {
            // Safari
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            // IE11
            elem.msRequestFullscreen();
        }
    }

    function closeFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            // Safari
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            // IE11
            document.msExitFullscreen();
        }
    }
</script>
@yield('scripts')
