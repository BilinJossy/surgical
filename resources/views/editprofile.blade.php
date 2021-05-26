@extends('theme3')

@section('content')
<!-- <div class="signup-form">
<form action="/customereditprocess/{{ $cview->id }}" method="post">
                  {{csrf_field()}}
		<h2 style="margin-left:600px;">Edit Profile<span>.</span></h2>
		{{-- <p>Customer id : {{$cview->id}}</p> --}}
		<hr>
        <div class="form-group">
        
        <input  type="text" class="form-control"  name="name"  style="background-color:#595858; color:white; width:800px;margin-left:400px;" value="{{$cview->name}}" required>
        </div>
        <div class="form-group">
        
        <input type="text" class="form-control" name="address"  style="background-color:#595858; color:white;width:800px;margin-left:400px;" value="{{$cview->address}}" required>
        </div>
		
        <div class="form-group">
        <input type="text" class="form-control"  name="pincode"  style="background-color:#595858; color:white;width:800px;margin-left:400px;" value="{{$cview->pincode}}"required>
        </div>
        
        <div class="form-group">
            <button style="width:800px;margin-left:400px;" type="submit" class="btn btn-primary btn-block btn-lg">Update Details</button>
        </div>
		<div class="form-group">
             </div>
		<p class="small text-center" style="color:black;">By clicking the Update button, change will be reflected in <br><a href="#">Database </a>.</p>
    </form>
    <a href="/Myprofile" class="btn btn-danger" style="color:white;width:800px;margin-left:400px;" data-toggle="modal"><span>Cancel</span></a>	 -->

<form action="/customereditprocess/{{ $cview->id }}" method="post" enctype="multipart/form-data">

{{ csrf_field() }}

<table class="table">

    

 <tr>
     <td>Customer-Name </td>
     <td>
      <input value="{{$cview->name}}" name="name" type="text" class="form-control" required>
     </td>
 </tr>
 <tr>
     <td>Address</td>
     <td>      <input value="{{$cview->address}}" name="address" type="text" class="form-control" required>
</td>
 </tr>
 <tr>
     <td>Pincode</td>
     <td>      <input value="{{$cview->pincode}}" name="pincode" type="text" class="form-control" required>
</td>
 </tr>
 <tr>
     <td> <button href="/Myprofile" class="btn_1"> CANCEL </button></td>
     <td> <button class="btn_3"> SUBMIT </button></td>
 </tr>
</table>


</form>

@endsection

