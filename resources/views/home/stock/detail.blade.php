

                <h3 class="modal-title">Instock No
                    @if(isset($in_stocks->id) )
                        {{ $in_stocks->id }}
                    @else
                        {{ $in_stocks->id }}
                    @endif detail:</h3><br>


<div class="portlet-body">
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="">
            <thead>
            <tr>
               
                <th> No</th>
                <th> Part No</th>
                <th > Part Name</th>
                <th > Barcode </th>
                <th > Out Qty </th>
                <th > Belong to </th>
                <th > Location </th>
            </tr>
            </thead>
           
            <tbody>
                @if(isset($in_stock_details))
                @foreach($in_stock_details as $key=> $item)
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                        <td>{{$item->part_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->barcode}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->belongto}}</td>
                        <td>{{$item->location}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
       
    </div>