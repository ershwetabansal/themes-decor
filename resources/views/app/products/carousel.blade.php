<ul class="list-products text-center">
    @foreach($products as $product)
        <li>
            @if($product->discount)
                <span class="text-discount">{{ $product->discount }}</span>
            @endif
            @if(sizeof($product->images) > 0 && $image = $product->images[0])
                <img src="{{ $image['path'] . $image['name'] }}"
                     class="product" alt="{{ $product->name }}"/>
            @endif
            <h2 class="text-truncate">
                <a href="/product/{{ $product->slug }}" target="_blank">
                    {{ $product->name }}
                </a>
            </h2>
            <span class="price">
                            {{ $product->price }} Rs
                    </span>
        </li>
    @endforeach
</ul>