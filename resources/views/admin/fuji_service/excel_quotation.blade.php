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
    <tbody>
    <tr>
        <th rowspan="2" colspan="10"> Fuji Machine Asia Pte Ltd</th>
    </tr>
    <tr></tr>
    <tr>
        <th rowspan="2" colspan="3"> Address:</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="3"> Phones:</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="3">Fax:</th>
    </tr>
    <tr>
        <th colspan="3">CO REG NO:</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="3">GST NO:</th>

    </tr>
    <tr></tr>
    <tr>
        <th colspan="3">Quotation:</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="3">Date:</th>

    </tr>
    <tr></tr>
    <tr>
        <th colspan="3">CANON VIETNAM CO. LTD</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="3">Valid Until : </th>

    </tr>
    <tr>
        <th rowspan="2" colspan="3"> Address customer:</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="3"> Payment:</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="3">MOD:</th>
    </tr>
    <tr>
        <th colspan="3">ATTN:</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="3">Term: </th>

    </tr>
    <tr>
        <th colspan="3">TEL:</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>


    </tr>



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
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="5">----------------------------------------------------------------------</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2">TOTAL JPY: </th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2">Total Discount: </th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2">Discount for Spares: </th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2">Export, Handling: </th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2">OUT OF SCOPE: </th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th colspan="10">-------------------------------------------------------------------------------------------------------------------------------------------------------------</th>
    </tr>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2">TOTAL JPY: </th>
        <th></th>
        <th></th>
    </tr>

    <tr>
        <th colspan="10">---------------------------------------------------------------------------------------------------------------------------------------------------------------</th>
    </tr>
    <tr>
        <th colspan="10">THIS QUOTATION IS SUBJECT TO THE GENERAL TERMS AND CONDITION OF SALE ATTACHED</th>
    </tr>
    <tr>
        <th colspan="10">** THIS QUOTATION IS BASED ON FOB SINGAPORE TERMS (VIA AIR SHIPMENT)</th>
    </tr>
    <tr>
        <th colspan="10">** PLEASE ISSUE PO AS PER THIS QUOTATION. IF THERE IS ANY AMENDMENT ON QUANTITY,</th>
    </tr>
    <tr>
        <th colspan="10">DO REQUEST FOR A NEW QUOTATION AS THIS QUOTE WILL BE VOID IF ITEMS AND QUANTITY CHANGES.</th>
    </tr>
    <tr>
        <th colspan="10">** 1 LOT SHIPMENT FOR PER QUOTATION.</th>
    </tr>
    <tr>
        <th colspan="10">** IN CASE OF BIG / BULKY ITEMS, SPECIAL HANDLING CHARGE MAY BE INCURRED.</th>
    </tr>
    <tr>
        <th colspan="10">** THE LEAD-TIME IS CALCULATED FROM THE SALES ORDER CONFIRMATION DATE</th>
    </tr>
    <tr></tr>
    <tr>
        <th colspan="10">THIS IS STANDARD LEAD TIME , SOME ITEMS MAY NEED LONGER LEAD TIME THAN USUAL. </th>
    </tr>
    <tr>
        <th colspan="10">WE WILL INFORM THE EXW-FMA DATE AFTER RECEIVE YOUR ORDER. </th>
    </tr>


    </tbody>
</table>
</body>

</html>