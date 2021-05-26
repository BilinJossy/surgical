@extends('theme2')

@section('content')

<form action="/itemprocess/{{ $item->id }}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}
    
    <table class="table">
    
        {{-- <tr>
            <td> CATEGORY </td>
            <td>
             <input value="{{   $item->cid }}" name="cid" type="text" class="form-control" required>
            </td>
        </tr>
        <tr>
            <td> BRAND </td>
            <td>
             <input value="{{   $item->bid }}" name="bid" type="text" class="form-control" required>
            </td>
        </tr> --}}
        

     <tr>
         <td> ITEM NAME</td>
         <td>
          <input value="{{   $item->name }}" name="prname" type="text" class="form-control" required>
         </td>
     </tr>
     <tr>
         <td>DESCRIPTION</td>
         <td>      <input value="{{   $item->des}}" name="pdes" type="text" class="form-control" required>
    </td>
     </tr>
     <tr>
         <td>QUANTITY</td>
         <td>      <input value="{{   $item->des}}" name="qty" type="text" class="form-control" required>
    </td>
     </tr>
     <tr>
         <td>COST-PRICE</td>
         <td>      <input value="{{   $item->cost}}" name="copri" type="text" class="form-control" required>
    </td>
     </tr>
     <tr>
         <td>SELLING-PRICE</td>
         <td>      <input value="{{   $item->sell}}" name="sepri" type="text" class="form-control" required>
    </td>
     </tr>
    <tr>
        <td>IMAGE </td>
        <td>      <input value="{{   $item->image }}" name="image" type="file" class="form-control" required>
   </td>
    </tr>
    
     <tr>
         <td></td>
         <td> <button class="btn btn-success"> SUBMIT </button></td>
     </tr>
    </table>
    
    
    </form>

    @endsection