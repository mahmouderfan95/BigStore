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
                        <div class="mt-3">
                            <i style = "font-size:27px" class="fa fa-shopping-cart fa-fw" data-productId="{{ $product->id }}"></i>
                                <i style = "font-size:27px" class="addToFav fa fa-heart fa-fw" data-productId="{{ $product->id }}"></i>
                        </div>
                        @include('site.includes.error-unlogin')
                        @include('site.includes.wished-success')
                        @include('site.includes.wished-danger')
                    </div>
                    @endforeach
                @endisset
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
            @guest
                $(".alert-danger-unlogin").show();
            @endguest
            $.ajax({
                type:'post',
                url: "{{ route('wishlist.store') }}",
                data:{
                    'productId' : $(this).attr('data-productId')
                },
                success:function(data){
                    if(data.wished)
                        $('.alert-success-wished').show().delay(350).fadeOut(250);
                    else
                        $('.alert-danger-wished').show().delay(350).fadeOut(250);
                },

            });
        });
    });
</script>

@stop
