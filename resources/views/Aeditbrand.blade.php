@extends('theme2')

@section('content')

<form action="/brandprocess/{{ $item->id }}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}
    
    <table class="table">
    
     <tr>
         <td> NAME </td>
         <td>
          <input value="{{   $item->bname }}" name="name" type="text" class="form-control" required>
         </td>
     </tr>
     <tr>
         <td>DESCRIPTION</td>
         <td>      <input value="{{   $item->bdes}}" name="desc" type="text" class="form-control" required>
    </td>
     </tr>
     <tr>
         <!-- <td> <button href="/Abrand" class="btn_1"> CANCEL </button></td> -->
         <td> <button class="btn_3"> SUBMIT </button></td>
     </tr>
    </table>
    
    
    </form>

    @endsection