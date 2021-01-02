<div class="nav-item ">
    <div class="container">
        <div class="nav-depart">
            <div class="depart-btn">
                <span class="ml-3">عرض كل المنتجات</span>
                <i class="fa fa-bars"></i>
                <ul class="depart-hover">
                    @foreach($products as $product)
                        <li class="active"><a href="#">{{ $product->name }}</a></li>
                    @endforeach
                    {{--  <li class="active"><a href="#">Women’s Clothing</a></li>
                    <li><a href="#">Men’s Clothing</a></li>
                    <li><a href="#">Underwear</a></li>
                    <li><a href="#">Kids Clothing</a></li>
                    <li><a href="#">Brand Fashion</a></li>
                    <li><a href="#">Accessories/Shoes</a></li>
                    <li><a href="#">Luxury Brands</a></li>
                    <li><a href="#">Brand Outdoor Apparel</a></li>  --}}
                </ul>
            </div>
        </div>
        <nav class="nav-menu">
            <ul>
                  @if($categories)
                    @foreach($categories as $cat)
                        <li><a href="{{ route('site.category',$cat->slug) }}">{{ $cat->name }}</a>
                            <ul class="dropdown">
                                @if($cat->children)
                                    @foreach($cat->children as $children)
                                        <li><a href="{{ route('site.category',$children->slug) }}">{{ $children->name }}</a>
                                            @if($children)
                                                @foreach($children->children as $child)
                                                    <li><a href="{{ route('site.category',$child->slug) }}">{{ $child->name }}</a></li>
                                                @endforeach
                                            @endif
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    @endforeach
                @endif

                <li class="active"><a href="{{ route('site.homepage') }}">الرئيسية</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
</div>
