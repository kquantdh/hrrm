<h3 class="modal-title">Outstock No:
    @if(isset($out_stocks->id) )
        PR{{str_pad($out_stocks->id, 4, '0',STR_PAD_LEFT)}}
    @else
        PR{{str_pad($out_stocks->id, 4, '0',STR_PAD_LEFT)}}
    @endif detail:</h3><br>

<div class="portlet-body">
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="">
            <thead>
            <tr>
                <th> No</th>
                <th > Part Name </th>
                <th > Part No </th>
                <th > Barcode </th>
                <th > Out Qty </th>
                <th > Belong to</th>
                <th > Location</th>
            </tr>
            </thead>
           
            <tbody>
                @if(isset($out_stock_details))
                @foreach($out_stock_details as $key=> $item)
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                        <td>{{$item->in_stock_detail->name}}</td>
                        <td>{{$item->in_stock_detail->part_id}}</td>
                        <td>{{$item->in_stock_detail->barcode}}</td>
                        <td>{{$item->out_quantity}}</td>
                        <td>{{$item->in_stock_detail->belongto}}</td>
                        <td>{{$item->in_stock_detail->location}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
       
    </div>