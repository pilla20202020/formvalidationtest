<!-- JAVASCRIPT -->
        {{-- <script src="assets/libs/jquery/jquery.min.js"></script> --}}
        <script src="{{asset('js/jquery.min.js')}} "></script>


        {{-- <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
        <script src="{{asset('js/bootstrap.bundle.min.js')}} "></script>

        {{-- <script src="assets/libs/metismenu/metisMenu.min.js"></script> --}}
        <script src="{{asset('js/metisMenu.min.js')}} "></script>

        {{-- <script src="assets/libs/simplebar/simplebar.min.js"></script> --}}
        <script src="{{asset('js/simplebar.min.js')}} "></script>


        {{-- <script src="assets/libs/node-waves/waves.min.js"></script> --}}
        {{-- <script src="{{asset('js/waves.min.js')}} "></script> --}}

        {{-- <script src="assets/js/pages/dashboard.init.js"></script> --}}
        {{-- <script src="{{asset('js/dashboard.init.js')}}"></script> --}}

        <!-- Sweet alert init js-->
        <script src="{{asset('js/sweet-alerts.init.js')}}"></script>

        <script src="{{asset('js/sweetalert2.min.js')}}"></script>

        {{-- <script src="assets/js/app.js"></script> --}}
        <script src="{{asset('js/app.js')}}"></script>

        {{-- Select2 --}}
        <script src="{{asset('js/select2.min.js')}}"></script>

        <script src="{{asset('js/scripts.js')}}"></script>

        <script src="{{ asset('js/toastr/toastr.js') }}"></script>

        <script src="{{asset('js/jquery.repeater.min.js')}}"></script>

        <script src="{{asset('js/form-repeater.init.js')}}"></script>


        @yield('page-specific-scripts')
        {!! Toastr::message() !!}


    </body>
</html>
