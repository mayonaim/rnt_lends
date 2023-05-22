<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>

{{-- tables --}}
<script src="{{ asset('DataTables-1.13.4/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('DataTables-1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>

{{-- button --}}
<script src="{{ asset('buttons/2.3.6/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('buttons/2.3.6/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('buttons/2.3.6/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('buttons/2.3.6/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('buttons/2.3.6/js/buttons.colVis.min.js') }}"></script>

{{-- pdfmake --}}
<script src="{{ asset('pdfmake/0.1.36/pdfmake.min.js') }}"></script>
<script src="{{ asset('pdfmake/0.1.36/vfs_fonts.js') }}"></script>


<script>
    $(document).ready(function() {
        var table = $('#table1').DataTable({
            buttons: ['pdf', 'exel'],
            dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
            lengthMenu: [
                [5, 10, 25, -1],
                [5, 10, 25, "ALL"]

            ]


        });

        table.buttons().container()
            .appendTo('#table1_wrapper .col-md-6:eq(0)');
    });
</script>
