@extends('theme2')

@section('content')

<form action="/catprocess/{{ $item->id }}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}
    
    <table class="table">
    
        

     <tr>
         <td>Category-Name </td>
         <td>
          <input value="{{   $item->cname }}" name="name" type="text" class="form-control" required>
         </td>
     </tr>
     <tr>
         <td>Description</td>
         <td>      <input value="{{   $item->cades}}" name="desc" type="text" class="form-control" required>
    </td>
     </tr>
     <tr>
         <td></td>
         <td> <button class="btn_3"> SUBMIT </button></td>
     </tr>
    </table>
    
    
    </form>

    @endsection