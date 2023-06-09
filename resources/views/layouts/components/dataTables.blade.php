@include('layouts.components.css')
@push('head')
    <link
        href="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/r-2.4.1/sc-2.1.1/datatables.min.css"
        rel="stylesheet" />
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

@include('layouts.components.body')
@push('body')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/r-2.4.1/sc-2.1.1/datatables.min.js">
    </script>
    <script>
        
    </script>
    <script>
        $(document).ready(function() {
            $('#borrowRequestsTable').DataTable({
                ajax: {
                    url: '/borrowing_requests', // Replace with the URL that corresponds to the borrowing requests endpoint
                    dataSrc: 'borrowRequests',
                },
                columns: [{
                        data: 'borrower.name'
                    },
                    {
                        data: 'supervisor.name'
                    },
                    {
                        data: 'asset.name'
                    },
                    {
                        data: 'start_timestamp'
                    },
                    {
                        data: 'end_timestamp'
                    },
                    {
                        data: 'borrowed_amount'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            // Add action buttons or links for each borrow request row
                            return '<a href="/borrowing_requests/' + row.id + '">View</a>';
                        }
                    }
                ]
            });
        });
    </script>
@endpush
