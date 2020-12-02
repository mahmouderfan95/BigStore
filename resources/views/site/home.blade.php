@extends('layoutes.site')
@section('title', 'Big Show Store')
@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/site/imgs/hero-1.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption col-lg-5">
                <span>ملابس نساء</span>
                <h1>عروض الصيف</h1>
                <a href="#" class="btn btn-primary mt-5">عرض الآن</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/site/imgs/hero-2.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption col-lg-5">
                <span>ملابس الأطفال</span>
                <h1>عروض الصيف</h1>
                <a href="#" class="btn btn-primary mt-5">عرض الآن</a>
            </div>
        </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('assets/site/imgs/banner-1.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>الرجال</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('assets/site/imgs/banner-2.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>النساء</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{ asset('assets/site/imgs/banner-3.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>الأطفال</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- Banner Ada begin -->
    <div class="container-fluid col-12 mb-5">
        <img src="{{ asset('assets/site/imgs/cart-page/en_hero-01.png') }}" />
    </div>
    <!-- Banner Ada begin -->

    <!-- Best Section Begin -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class=" row col-lg-6 col-sm-6 items ml-auto mr-auto m-1 text-center">
                    <div class="col-lg-6 col-sm-6 items ml-auto mr-auto m-1 text-center">
                        <img class="rounded" src="{{ asset('assets/site/imgs/cart-page/en_cat-module-11.png') }}" />
                    </div>
                    <div class="col-lg-6 col-sm-6 items ml-auto mr-auto m-1 text-center">
                        <img class="rounded" src="{{ asset('assets/site/imgs/cart-page/en_cat-module-06.png') }}" />
                    </div>
                    <div class="col-lg-6 col-sm-6 items ml-auto mr-auto m-1 text-center">
                        <img class="rounded" src="{{ asset('assets/site/imgs/cart-page/en_cat-module-04.png') }}" />
                    </div>
                    <div class="col-lg-6 col-sm-6 items ml-auto mr-auto m-1 text-center">
                        <img class="rounded" src="{{ asset('assets/site/imgs/cart-page/en_cat-module-07.png') }}" />
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 items ml-auto mr-auto text-center">
                    <img class="rounded" height="350" src="{{ asset('assets/site/imgs/cart-page/en_cat-module-03.png') }}" />
                </div>
            </div>
        </div>
    </div>
    <!-- Best Section End -->

    <!-- Best Section Begin -->
    <div class="container-fluid">
        <div class="container col-12 mt-5 mb-5">
            <h3 style="text-align: right;">الأكثر مبيعا</h3>
        </div>
        <div class="container-fluid bg-Collaction">
            <div class="row">
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/products/women-1.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/products/women-1.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/products/man-3.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale mr-auto">
                    <img src="{{ asset('assets/site/imgs/products/women-3.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2 stars-fa">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale mr-auto">
                    <img src="{{ asset('assets/site/imgs/products/women-4.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2 stars-fa">
                        <i class="fa fa-star  stars-fa stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/products/women-4.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Best Section End -->

    <!-- Banner Ada begin -->
    <div class="container-fluid col-12 mt-5 mb-5">
        <img src="{{ asset('assets/site/imgs/cart-page/en_hero-01 (1).png') }}" />
    </div>
    <!-- Banner Ada begin -->

    <!-- Best Section Begin -->
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-3 col-sm-6 items ml-auto mr-auto m-1 text-center">
                    <img class="rounded" src="{{ asset('assets/site/imgs/cart-page/en_cat-module-01.png') }}" />
                </div>
                <div class="col-lg-3 col-sm-6 items ml-auto mr-auto m-1 text-center">
                    <img class="rounded" src="{{ asset('assets/site/imgs/cart-page/en_cat-module-02.png')}}" />
                </div>
                <div class="col-lg-3 col-sm-6 items ml-auto mr-auto m-1 text-center">
                    <img class="rounded" src="{{ asset('assets/site/imgs/cart-page/en_cat-module-03.png') }}" />
                </div>
                <div class="col-lg-3 col-sm-6 items ml-auto mr-auto m-1 text-center">
                    <img class="rounded" src="{{ asset('assets/site/imgs/cart-page/en_cat-module-04.png') }}" />
                </div>
            </div>
        </div>
    </div>
    <!-- Best Section End -->

    <!-- Best Section Begin -->
    <div class="container-fluid">
        <div class="container col-12 mt-5 mb-5">
            <h3 style="text-align: right;">الألكترونيات</h3>
        </div>
        <div class="container-fluid bg-Collaction">
            <div class="row">
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/cart-page/N13035683A_1.jpg') }}" />
                    <h5 class="mt-2">IdeaPad S145-15IGM Laptop</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/cart-page/N27643240A_1.jpg') }}" />
                    <h5 class="mt-2">IdeaPad S145-15IGM Laptop</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale  ">
                    <img src="{{ asset('assets/site/imgs/cart-page/N29498782A_1.jpg') }}" />
                    <h5 class="mt-2">IdeaPad S145-15IGM Laptop</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/cart-page/N34454578A_1.jpg') }}" />
                    <h5 class="mt-2">IdeaPad S145-15IGM Laptop</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale  ">
                    <img src="{{ asset('assets/site/imgs/cart-page/N36660156A_1.jpg') }}" />
                    <h5 class="mt-2">IdeaPad S145-15IGM Laptop</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale">
                    <img src="{{ asset('assets/site/imgs/cart-page/N27643240A_1.jpg') }}" />
                    <h5 class="mt-2">IdeaPad S145-15IGM Laptop</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Best Section End -->

    <!-- Banner Ada begin -->
    <div class="container-fluid col-12 mt-5 mb-5">
        <img src="{{ asset('assets/site/imgs/cart-page/en_hero-02.png') }}" />
    </div>
    <!-- Banner Ada begin -->

    <!-- Best Section Begin -->
    <div class="container-fluid">
        <div class="container col-12 mt-5 mb-5">
            <h3 style="text-align: right;">ملابس و ازياء</h3>
        </div>
        <div class="container-fluid bg-Collaction">
            <div class="row">
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/products/man-1.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/products/man-1.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/products/man-2.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/products/man-3.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/products/man-4.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/products/man-1.jpg') }}" />
                    <h5 class="mt-2">بلوفر نسائي</h5>
                    <div class="ml-auto mr-auto mt-2">
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                        <i class="fa fa-star stars-fa"></i>
                    </div>
                    <div class="ml-auto mr-auto mt-2">
                        <h6 class="font-weight-bold">100 SR</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Best Section End -->


@stop
