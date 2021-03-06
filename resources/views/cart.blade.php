@extends('theme')

@section('content')
<?php
use App\Http\Controllers\ShoppingController;
$tp=ShoppingController::totalprice();
?>
<!-- <h1>{{session('sname')->name}}</h1> -->
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>cart list</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Cart Area =================-->
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <!-- <th scope="col">Total</th> -->
              </tr>
            </thead>
            <tbody>
            @foreach ($item as $i)
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src= "{{ URL ::asset('assets/img/gallery/'.$i->cart->image) }}" alt="" />
                    </div>
                    <div class="media-body">
                      <p>{{ $i->cart->name }}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>Rs.{{ $i->cart->sell }}</h5>
                </td>
                <td>
                <h5>{{ $i->qty }} Nos</h5>
                  <!-- <div class="product_count">
                     <input type="text" value="1" min="0" max="10" title="Quantity:"
                      class="input-text qty input-number" />
                    <button
                      class="increase input-number-increment items-count" type="button">
                      <i class="ti-angle-up"></i>
                    </button>
                    <button
                      class="reduced input-number-decrement items-count" type="button">
                      <i class="ti-angle-down"></i>
                    </button> 
                    <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                    <input class="input-number" type="text" value="1" min="0" max="10">
                    <span class="input-number-increment"> <i class="ti-plus"></i></span>
                  </div> -->
                </td>
                <td>
                  <h5Rs.{{ $i->qtyprice }}</h5>
                </td>

                <td>
                      <a href="/removecart/{{ $i->id }}" class="btn btn-primary">Delete</a>
                </td>

              </tr>
              @endforeach
              <!-- <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src = " " alt="" />
                    </div>
                    <div class="media-body">
                      <p></p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>Rs.</h5>
                </td>
                <td>
                  <div class="product_count">
                      <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                      <input class="input-number" type="text" value="1" min="0" max="10">
                      <span class="input-number-increment"> <i class="ti-plus"></i></span>
                  </div>
                </td>
                <td>
                  <h5>$720.00</h5>
                </td>
              </tr> -->
              <tr class="bottom_button">
                <td>
                  <a class="btn_1" href="/productlist">Update Cart</a>
                </td>
                <td></td>
                <td></td>
                <td>
                  <!-- <div class="cupon_text float-right">
                    <a class="btn_1-disabled" href="#">Close Coupon</a>
                  </div> -->
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Subtotal</h5>
                </td>
                <td>
                  <h5>Rs.{{ $tp }}</h5>
                </td>
              </tr>
              <tr class="shipping_area">
                <td></td>
                <td></td>
                <td>
                  <h5>Shipping</h5>
                </td>
                <td>
                  <div class="shipping_box">
                    <ul class="list">
                      <!-- <li>
                        Flat Rate: $5.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li> -->
                      <li>
                        Free Shipping
                        <!-- <input type="radio" aria-label="Radio button for following text input"> -->
                      </li>
                      <!-- <li>
                        Flat Rate: $10.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li> -->
                      <!-- <li class="active">
                        Local Delivery: $2.00
                        <input type="radio" aria-label="Radio button for following text input">
                      </li> -->
                    </ul>
                    <!-- <h6>
                      Calculate Shipping
                      <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </h6>
                    <select class="shipping_select">
                      <option value="1">Bangladesh</option>
                      <option value="2">India</option>
                      <option value="4">Pakistan</option>
                    </select>
                    <select class="shipping_select section_bg">
                      <option value="1">Select a State</option>
                      <option value="2">Select a State</option>
                      <option value="4">Select a State</option>
                    </select>
                    <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                    <a class="btn_1" href="#">Update Details</a> -->
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="/productlist">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="/checkout">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->
  @endsection