        <!--=====Jquery=====-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <script src="{{ asset('dashboard_assets/assets') }}/plugins/jquery/jquery-git.min.js"></script> --}}
        <!--=====Bootstrap Js=====-->
        <script src=" {{ asset('dashboard_assets/assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"> </script>
        <!--=====Icon Js=====-->
        <script src="{{ asset('dashboard_assets/assets') }}/icons/js/all.js">
        </script>
        <!--====Chart====-->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <!--=====Vmap Js=====-->
        <script src="{{ asset('dashboard_assets/assets') }}/plugins/vmap/js/jquery.vmap.js"></script>
        <script src="{{ asset('dashboard_assets/assets') }}/plugins/vmap/js/jquery.vmap.world.js"></script>
        <!--==========Data Tables==========-->
        <script src="./{{ asset('dashboard_assets/assets') }}/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <!--=====Main Js====-->
        <script src="{{ asset('dashboard_assets/assets') }}/js/script.js"></script>
        {{-- select 2 --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            // $(function () {
            //     $('.selectpicker').selectpicker();
            // });
        </script>

        {{-- toastr js--}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {{-- trix js --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


        <script>
            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: '#fff',
                borderColor: '#818181',
                borderOpacity: 0.25,
                borderWidth: 1,
                color: '#DADFE2',
                enableZoom: true,
                hoverColor: '#c9dfaf',
                hoverOpacity: null,
                normalizeFunction: 'linear',
                scaleColors: ['#b6d6ff', '#005ace'],
                selectedColor: '#c9dfaf',
                selectedRegions: null,
                enableZoom: false
            });

            $('#myTable').DataTable();
            $('.dataTables_filter').hide();
            $('.dataTables_length').hide();
            $('.previous').text('');
            $('.previous').append('<i class="fa-solid fa-caret-left"></i>');
            $('.next').text('');
            $('.next').append('<i class="fa-solid fa-caret-right"></i>');
        </script>

        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
        @endif

        @if (session()->get('danger'))
        <script>
            toastr.error('{{ session()->get('danger') }}');
        </script>
        @endif

        @if (session()->get('success'))
        <script>
            toastr.success('{{ session()->get('success') }}');
        </script>
        @endif

        @yield('js')

    </body>
</html>

