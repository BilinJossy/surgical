@extends('theme2')


@section('content')
<div class="container">

<div class="row">


    <div class="col-lg-12">
        <table class="table ">
            <tr>
                <th>NAME</th>
                <th>EMAIL</th>
                <!-- <th>ADDRESS</th>
                <th>PINCODE</th> -->
                
                {{-- <th>UPDATE </th> --}}
                {{-- <th>DELETE </th> --}}
            </tr>
            @foreach($item as $i)
            {{ csrf_field() }}
            <tr>
                <td>{{ $i->name }}</td>
                <td>{{ $i->email }}</td>
                <!-- <td>{{ $i->address }}</td>
                <td>{{ $i->pincode }}</td> -->
            
            </tr>
            
            @endforeach
            
            </table>

    </div>


</div>


</div>


    @endsection