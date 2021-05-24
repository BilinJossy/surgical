@extends('theme2')


@section('content')
<div class="container">

<div class="row">
    <form class="d-flex" action="report" method="POST">
        {{ csrf_field() }}
        <input style="width: 170px;margin-left:400px" class="form-control me-2" type="date" placeholder="Search" aria-label="Search" name="date1">
        <input style="width: 170px"class="form-control me-2" type="date" placeholder="Search" aria-label="Search" name="date2">
       <br> <button class="btn btn-outline-success" type="submit">Submit</button>
      </form>
      


    <div class="col-lg-12">
        <br> <br><table class="table ">
            <tr>
                <th>ORDER-ID</th>
                <th>CUSTOMER-NAME</th>
                <th>PRODUCT-NAME</th>
                <th>QUANTITY</th>
                <th>PRICE </th>
                <th>TOTAL</th>
                <th>DATE</th>
            </tr>
            @foreach($item as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $i->customer->name }}</td>
                <td>{{ $i->order->iname }}</td>
                <td>{{ $i->oqty }}</td>
                <td>{{ $i->oprice }}</td>
                <td>{{ $i->ototal }}</td>
                <td>{{ $i->odate }}</td>
               
                
            
            </tr>
            
            @endforeach
            
            </table>

    </div>


</div>


</div>


    @endsection