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
@if($fuji_services->job_type==1 ||$fuji_services->job_type==5)
    @include('admin.fuji_service.pdf_quotation_table.table_quotation_part')
@elseif($fuji_services->job_type==2 ||$fuji_services->job_type==6)

@elseif($fuji_services->job_type==3 ||$fuji_services->job_type==7)

@else
    @include('admin.fuji_service.pdf_quotation_table.table_quotation_part_service')
@endif

</body>
</html>
