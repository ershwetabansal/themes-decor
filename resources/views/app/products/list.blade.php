<ul class="list-inline list-products">
    @foreach($products as $product)
        <li class="text-center">
            <form method="post" action="{{ url('/cart/store') }}" data-form="cart">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $product->id }}">
                @if($product->discount)
                    <span class="text-discount">{{ $product->discount }}</span>
                @endif
                @if(sizeof($product->images) > 0 && $image = $product->images[0])
                    <a href="/product/{{ $product->slug }}">
                        <img src="{{ $image['path'] . $image['name'] }}"
                         class="product" alt="{{ $product->name }}"/>
                    </a>
                @endif
                <h2 class="text-truncate">
                    <a href="/product/{{ $product->slug }}">
                        {{ $product->name }}
                    </a>
                </h2>
                <span class="price">
                    {{ $product->price }} Rs
                </span>
                <input type="hidden" name="quantity" value="1">
                <span class="in-cart {{ $product->addedToCart ? '' : 'hidden' }}" data-type="success">Added to the cart</span>
                <button class="btn btn-primary btn-cart">
                    <img src="/images/site/loading.gif" alt="Loading" class="hidden" data-type="loading">
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </button>
            </form>
        </li>
    @endforeach
</ul>