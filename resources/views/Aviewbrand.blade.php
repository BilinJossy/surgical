@extends('theme2')


@section('content')
<div class="container">

<div class="row">


    <div class="col-lg-12">
        <table class="table ">
            <tr>
                <th>BRAND-NAME</th>
                <th>DESCRIPTION</th>
                
                <th>UPDATE </th>
                {{-- <th>DELETE </th> --}}
            </tr>
            @foreach($item as $i)
            {{ csrf_field() }}
            <tr>
                <td>{{ $i->bname }}</td>
                <td>{{ $i->bdes }}</td>
  
                <td><a class="btn_3" href={{"/Aeditbrand/".$i->id}}>EDIT</a></td>
                {{-- <td><a class="btn btn-danger"  href={{"/deletecat/".$i->id}}>DELETE</a></td> --}}
            
            </tr>
            
            @endforeach
            
            </table>

    </div>


</div>


</div>


    @endsection