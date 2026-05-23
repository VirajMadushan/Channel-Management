
<!-- Required vendors -->
<script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart-js/chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script>

<!-- Dashboard 1 -->
<script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"></script>
<script src="{{ asset('assets/vendor/draggable/draggable.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/js/swiper-bundle.min.js') }}"></script>

<script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>

<!-- Apex Chart -->

<script src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>


<!-- Vectormap -->
<script src="{{ asset('assets/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jqvmap/js/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('assets/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('assets/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/js/deznav-init.js') }}"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script>
{{-- <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script> --}}
<script>
    jQuery(document).ready(function() {
        setTimeout(function() {
            dzSettingsOptions.version = 'dark';
            new dzSettings(dzSettingsOptions);

            setCookie('version', 'dark');

        }, 1500)
    });
</script>
