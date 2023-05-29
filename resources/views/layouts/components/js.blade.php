<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('DataTables-1.13.4/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('DataTables-1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('JSZip-2.5.0/jszip.min.js') }}"></script>
<script src="{{ asset('pdfmake-0.1.36/pdfmake.min.js') }}"></script>
<script src="{{ asset('pdfmake-0.1.36/vfs_fonts.js') }}"></script>
<script src="{{ asset('Buttons-2.3.6/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('Buttons-2.3.6/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('Buttons-2.3.6/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('Buttons-2.3.6/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('Buttons-2.3.6/js/buttons.colVis.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>
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

<script>
    $(document).ready(function() {
        $('#mySelect').select2({
            theme: 'bootstrap-5'
        });
    });
</script>
