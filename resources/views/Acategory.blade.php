@extends('theme2')

@section('content')



    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Add Category</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Surgeons must be very careful when they take the knife!  </h2>
                            <!--<p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="/register" class="btn_3">Create an Account</a>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Hey Admin !<br>
                                Add Category here</h3>
                            <form class="row contact_form" action="/Acategory1" method="post" novalidate="novalidate">
                            {{csrf_field()}}
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="cname" value=""
                                        placeholder="Category Name">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="cdes" name="cades" value=""
                                        placeholder="Description">
                                </div>
                                <!--<div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>-->
                                    <button type="submit" value="submit" class="btn_3">
                                        Add Category
                                    </button>
                                    <!--<a class="lost_pass" href="#">forget password?</a>-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    @endsection