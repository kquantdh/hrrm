<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            font-family: Arial;font-family: Arial;
            font-size: 10px;
            border: none;
            border-collapse: collapse;
            margin: 0px;
            padding: 0;
        }

        th {
            padding: 5px;
            text-align: left;


        }

        td {
            padding: 0.5px;
            text-align: left;


        }

    </style>
</head>
<body>
@switch($fuji_services->job_type)
@case('1')
@include('admin.fuji_service.pdf_quotation_table.table_quotation_part')
@break
@case('2')
@include('')
@break
@case('3')
@include('')
@break
@case('4')
@include('admin.fuji_service.pdf_quotation_table.table_quotation_part_service')
@break
@case('5')
@include('')
@break
@case('6')
@include('')
@break
@endswitch

</body>
</html>
