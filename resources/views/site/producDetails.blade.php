    @foreach($product_attributes as $art)
        @foreach($art->options as $op)
            {{ $op }}
        @endforeach
    @endforeach

