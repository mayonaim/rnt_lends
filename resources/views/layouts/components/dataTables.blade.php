@include('layouts.components.css')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
@endpush

<table id="myTable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th></th>
            @stack('thead')
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            @stack('tbody')
        </tr>
    </tbody>
</table>

@include('layouts.components.js')
@push('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            var t = $('#myTable').DataTable({
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
@endpush
