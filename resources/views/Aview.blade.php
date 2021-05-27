@extends('theme2')


@section('content')
<div class="container">

<div class="row">


    <div class="col-lg-12">
        <table class="table ">
            <tr>
                <th>CATAGORY</th>
                <th>BRAND</th>
                <!--<th>MODEL</th>-->
                <th>ITEM-NAME</th>
                <th>ITEM-DESCRIPTION</th>
                <th>ITEM-QUANTITY</th>
                <th>ITEM-COST-PRICE</th>
                <th>ITEM-SELLINGPRICE</th>
                <th>ITEM-IMAGE</th>
                <th>UPDATE </th>
                <th>DELETE </th>
            </tr>
            @foreach($item as $i)
            <tr>
                <td>{{ $i->category->cname }}</td>
                <td>{{ $i->brand->bname }}</td>
                <td>{{ $i->name }}</td>
                <td>{{ $i->des }}</td>
                <td>{{ $i->qty}}</td>
                <td>{{ $i->cost }}</td>
                <td>{{ $i->sell }}</td>
                <!-- <td>{{ $i->image}}</td> -->
                <!-- <td>{{ $i->isprice }}</td>
                <td>{{ $i->icprice }}</td> -->
                <td><img width="150" height="100" src="{{ URL ::asset('assets/img/gallery/'.$i->image) }}"></td>
                <td><a class="btn_1" href={{"/Aedit/".$i->id}}>EDIT</a></td>
                <td><a class="btn_3"  href={{"/Adelete/".$i->id}}>DELETE</a></td>
            
            </tr>
            
            @endforeach
            
            </table>

    </div>


</div>


</div>


    @endsection