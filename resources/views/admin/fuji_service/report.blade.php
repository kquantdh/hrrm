<!DOCTYPE html>
<html lang="en">
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>123</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #3 for managed datatable samples" name="description"/>
    <meta content="" name="author"/>


</head>
<body>


<table >
    <thead>
    <tr>
        <th rowspan="2"> Item No</th>
        <th rowspan="2"> Part Number </th>
        <th rowspan="2"> Part Name</th>
        <th rowspan="2"> Q'ty</th>
        <th rowspan="2"> Unit</th>
        <th rowspan="2"> Unit Price</th>
        <th rowspan="2"> Discount </th>
        <th rowspan="2"> Discount Price</th>
        <th rowspan="2"> Amount </th>
        <th rowspan="2"> Lead time </th>
    </tr>
    <tr></tr>
    @foreach($fuji_service_details as $key=> $list)
    <tr>
        <td>{{($key++)+1}}</td>
        <td>{{$list->part_id}}</td>
        <td>{{$list->name}}</td>
        <td>{{$list->quantity}}</td>
        <td>pc</td>
        <td>{{$list->price}}</td>
        <td>@foreach($fuji_services as $item){{$item->discount}} @endforeach</td>
        <td>@foreach($fuji_services as $item){{$item->discount*$list->price}} @endforeach</td>
        <td>@foreach($fuji_services as $item)
                {{($item->part_amount+$item->service_amount)*(1-($item->discount_part/100))}}
            @endforeach
        </td>

        <td></td>


    </tr>
        @endforeach

    </thead>
    <tbody>





    </tbody>
</table>


</body>

</html>