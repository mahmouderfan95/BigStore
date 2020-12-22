@extends('layoutes.site')
@section('title','المفضله')
@section('content')
<div class="container-fluid">
    <div class="container col-12 mt-5 mb-5">
        <h3 style="text-align: right;">{{ __('site.faviorate_list') }}</h3>
    </div>
    <div class="container-fluid bg-Collaction">
        <div class="row">
            @isset($wishlistsUser)
                @foreach($wishlistsUser as $product)
                <div class="col-lg-2 col-sm-6 item-sale ">
                    <img src="{{ asset('assets/site/imgs/products/women-1.jpg') }}" />
                    <h5 class="mt-2"><a href="#">{{ $product->name }} </a></h5>
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
                        <a id="delete-product" class="btn btn-danger" data-productId="{{ $product->id }}">حذف المنتج</a>
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




@stop
@section('scripts')
<script src="{{ asset('assets/site/js/jquery-3.4.1.js') }}"></script>

<script>
    $(function(){
        $.ajaxSetup({
            headers:{
                'x-CSRF-TOKEN' : "{{ csrf_token() }}"
            }
        });

        $('#delete-product').on('click',function(e){
            e.preventDefault();
            $.ajax({
                type:'delete',
                url: "{{ route('wishlist.destroy') }}",
                data:{
                    'productId' : $(this).attr('data-productId')
                },
                success:function(data){
                    if(data.wishedDelete)
                        location.reload();
                    else
                        alert('error');
                },

            });
        });
    });
</script>

@stop
