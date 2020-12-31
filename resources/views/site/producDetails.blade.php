@extends('layoutes.site')
@section('content')
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                      <div class="preview-pic tab-content">
                        @if(isset($product->images) && count($product->images) > 0)
                                <div class="tab-pane active">
                                    <img src="{{ asset('assets/upload/products/' . $product->images[0]->photo) }}" />
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                    @foreach($product->images as $img)
                                        <li class="active"><a  data-toggle="tab"><img src="{{ asset('assets/upload/products/' . $img->photo) }}" /></a></li>
                                    @endforeach
                                </ul>
                        @endif
                    </div>


                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{ $product->name }}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div>
                    <p class="product-description">{{ $product->description }}</p>
                    <h4 class="price">current price: <span>${{ $product->price }}</span></h4>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    @if(isset($product_attributes) && count($product_attributes) > 0)
                        @foreach($product_attributes as $attr)
                            <h5 class="sizes">{{ $attr->name }}:
                                @if(isset($attr->options) && count($attr->options) > 0)
                                    @foreach($attr->options as $option)
                                        <span>{{ $option->name }}</span>
                                    @endforeach
                                @endif

                            </h5>
                        @endforeach
                    @endif

                    <div class="action">
                        <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div


@stop
