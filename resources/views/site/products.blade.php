@extends('layoutes.site')
@section('title', $category->name)
@section('content')
<!-- Best Section Begin -->
    <div class="container-fluid">
        <div class="container col-12 mt-5 mb-5">
            <h3 style="text-align: right;">{{ $category->name }}</h3>
        </div>
        <div class="container-fluid bg-Collaction">
            <div class="row">
                @isset($products)
                    @foreach($products as $product)
                    <div class="col-lg-2 col-sm-6 item-sale ">
                        <img src="{{ asset('assets/site/imgs/products/women-1.jpg') }}" />
                        <h5 class="mt-2"><a href="{{ route('site.productdetails',$product->slug) }}">{{ $product->name }} </a></h5>
                        <div class="ml-auto mr-auto mt-2">
                            <i class="fa fa-star stars-fa"></i>
                            <i class="fa fa-star stars-fa"></i>
                            <i class="fa fa-star stars-fa"></i>
                            <i class="fa fa-star stars-fa"></i>
                            <i class="fa fa-star stars-fa"></i>
                        </div>
                        <div class="ml-auto mr-auto mt-2">
                            <h6 class="font-weight-bold">{{ floor($product->price)}} SAR</h6>
                        </div>
                        <div>
                            <i class="fa fa-shopping-cart fa-fw" data-productId="{{ $product->id }}"></i>
                            <i class="addToFav fa fa-heart fa-fw" data-productId="{{ $product->id }}"></i>
                        </div>
                    </div>
                    @endforeach
                @endisset

                {{-- <div class="col-lg-2 col-sm-6 item-sale ">
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
                </div> --}}
            </div>
        </div>
    </div>

<!-- Best Section End -->
@endsection
@section('scripts')
<script src="{{ asset('assets/site/js/jquery-3.4.1.js') }}"></script>

<script>
    $(function(){
        $.ajaxSetup({
            headers:{
                'x-CSRF-TOKEN' : "{{ csrf_token() }}"
            }
        });
        $('.addToFav').on('click',function(e){
            e.preventDefault();
            $.ajax({
                type:'post',
                url: "{{ route('wishlist.store') }}",
                data:{
                    'productId' : $(this).attr('data-productId')
                },


            });
        });
    });
</script>

@stop
