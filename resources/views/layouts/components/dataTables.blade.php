@include('layouts.components.css')
@push('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap5.min.css" />
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
@endpush

<table id="myTable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th></th>
            @stack('table-headers')
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            @stack('table-contents')
        </tr>
    </tbody>
</table>

@include('layouts.components.js')
@push('body')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            var t = $('#myTable').DataTable({
                responsive: true,
                scrollX: true,
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 0,
                }, ],
                order: [
                    [1, 'asc']
                ],
            });

            t.on('order.dt search.dt', function() {
                let i = 1;

                t.cells(null, 0, {
                    search: 'applied',
                    order: 'applied'
                }).every(function(cell) {
                    this.data(i++);
                });
            }).draw();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#table1').DataTable({
                buttons: ['pdf', 'exel'],
                dom:"<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                    "<'row'<'col-md-12'tr>>" +
                    "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu: [
                    [5, 10, 25, -1],
                    [5, 10, 25, "ALL"]
                ]
            });

            table.buttons().container()
                .appendTo('#myTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
