<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
</head>
<body>
<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Start date</th>
        @if($isAdmin)z
        <th>Salary</th>
            @endif
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Start date</th>
        @if($isAdmin)
            <th>Salary</th>
            @endif
    </tr>
    </tfoot>
</table>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },

            pagingType: "full_numbers",
            ordering:true,
            info:false,
            dom: 'Bfrtip',
            language: {
                "paginate": {
                    "first":"Đầu",
                    "previous": "Trước",
                    "next":"Tiếp",
                    "last":"cuối"
                },
                "sLengthMenu": "Xem _MENU_ bản ghi",
                "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                'sSearchPlaceholder':'Tìm kiếm',
                processing: "<div id='divloader'></div>",
            },
            responsive: true,
            searching: true,
            lengthMenu: [[50, 100,150, 200, 500, -1], [50, 100,150, 200, 500, 'ALL']],
            "processing": true,
            "serverSide": true,
            "ajax": "http://localhost:8080/hrrm/public/api/v1/api-test",
            columns: [
                {
                    "data":"id",
                    "name": "id",
                    "orderable": true,
                    "className":"text-center",
                },
                {
                    "data":"id",
                    "name": "name",
                    "orderable": true,
                    "className":"text-center",
                },
                {
                    "data":"id",
                    "name": "description",
                    "orderable": false,
                    "className":"text-center",
                },
                {
                    "data":"id",
                    "name": "rep_new",
                    "orderable": false,
                    "className":"text-center",
                },
                {
                    "data":"id",
                    "name": "machine",
                    "orderable": false,
                    "className":"text-center",
                },
                @if($isAdmin)
                {
                    "data":"price",
                    "name": "price",
                    "orderable": false,
                    "className":"text-center",
                },
                @endif
                ]
        } );
    } );
</script>
</body>
</html>