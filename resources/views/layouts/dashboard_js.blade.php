        <!--=====Jquery=====-->
        <script src="{{ asset('dashboard_assets/assets') }}/plugins/jquery/jquery-git.min.js"></script>
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

        <script>
            // $(function () {
            //     $('.selectpicker').selectpicker();
            // });
        </script>

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

    </body>
</html>

