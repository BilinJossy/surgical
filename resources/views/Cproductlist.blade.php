@extends('theme')

@section('content') 

    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>product list</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
    
    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <form action="#">
                                <input type="text" name="#" placeholder="Search keyword">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Category <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="#">Category 1</a></p>
                                    <p><a href="#">Category 2</a></p>
                                    <p><a href="#">Category 3</a></p>
                                    <p><a href="#">Category 4</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Type <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="#">Type 1</a></p>
                                    <p><a href="#">Type 2</a></p>
                                    <p><a href="#">Type 3</a></p>
                                    <p><a href="#">Type 4</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product_list">
                        <div class="row">
                        {{csrf_field()}}
                         @foreach ($item as $i) 
                         
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="single_product_item">
                                        <a href="/singleproduct1/{{ $i['id'] }}"> 
                                        <img width="340" height="340" src="{{ URL ::asset('assets/img/gallery/'.$i->image)}}">
                                        <div class="img-cap">
                                        </a>
                                        <!-- <form action="/singleproduct/{id}" method="POST"> -->
                                             <!-- <span><a href="/singleproduct/{{ $i['id'] }}">View Products</a></span>  -->
                                            <!-- {{ csrf_field() }} -->
                                            <!-- <input type="hidden" name="qty" value= "1" > -->
                                            <input type="hidden" name="item" value="{{ $i['id'] }}">
                                            <!-- <span><button class="btn btn-danger">add to cart</button> </span> </form>-->
                                        </div>
                                        <!-- <div class="favorit-items">
                                            <span class="flaticon-heart"></span> -->
                                        </div>
                                    </div>
                                    <div class="popular-caption">
                                        <h3>{{ $i['name'] }}</h3>
                                        <!-- <h3>{{ $i['des'] }}</h3>  -->
                                        <p>Rs:{{ $i['sell'] }}</p> 
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>

                            <!-- <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="{{ URL ::asset('assets/img/gallery/'.$i->image)}}" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.html">Cervical pillow for airplane
                                    car office nap pillow</a> </h3>
                                    <p>From $5</p>
                                </div>  -->
                            
                            <!-- <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_2.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.html">Geometric striped flower home classy decor</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_3.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.html">Foam filling cotton slow rebound pillows</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div> -->
                            <!-- <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_4.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.html">Memory foam filling cotton Slow rebound pillows</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_5.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.html">Memory foam filling cotton Slow rebound pillows</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_6.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.html">Sleeping orthopedic sciatica Back Hip Joint Pain relief</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_7.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.html">Memory foam filling cotton Slow rebound pillows</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_8.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.html">Sleeping orthopedic sciatica Back Hip Joint Pain relief</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_9.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.html">Geometric striped flower home classy decor</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_item">
                                    <img src="img/product/product_list_10.png" alt="#" class="img-fluid">
                                    <h3> <a href="single-product.html">Geometric striped flower home classy decor</a> </h3>
                                    <p>From $5</p>
                                </div>
                            </div>
                        </div>  -->
                        <div class="load_more_btn text-center">
                            <a href="#" class="btn_3">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->
    
    <!-- client review part here -->
    <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client_1.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="img/client_2.png" alt="#">
                            </div>
                            <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                            <h5>- Micky Mouse</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->

    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">
                        <h3>Credibly innovate granular
                        internal or organic sources
                        whereas standards.</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_1.svg" alt="#">
                        <h4>Credit Card Support</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_2.svg" alt="#">
                        <h4>Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_3.svg" alt="#">
                        <h4>Free Delivery</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="img/icon/feature_icon_4.svg" alt="#">
                        <h4>Product with Gift</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature part end -->

    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="#" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe part end -->

 <!-- @endsection -->