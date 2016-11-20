@extends('layouts.app')

@section('content')
    <div class="content-container">
        <ul class="list-products">
            @foreach($products as $product)
                <li class="text-center">
                    <form method="post" action="{{ url('/cart/store') }}" data-form="cart">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        @if($product->discount)
                            <span class="text-discount">{{ $product->discount }}</span>
                        @endif
                        @if(sizeof($product->images) > 0 && $image = $product->images[0])
                            <img src="{{ $image['path'] . $image['name'] }}" alt="{{ $product->name }}" style="max-width: 100%;height: 80px;" />
                        @endif
                        <h2 class="text-truncate">
                            <a href="/product/{{ $product->slug }}" target="_blank">
                                {{ $product->name }}
                            </a>
                        </h2>
                        <span>
                        {{ $product->price }} Rs
                        </span>
                        <div class="input-group">
                            <span class="input-group-addon" data-type="decrement" data-update="quantity">-</span>
                            <input type="number" value="1" class="form-control text-center"
                                   data-type="quantity" name="quantity" />
                            <span class="input-group-addon" data-type="increment" data-update="quantity">+</span>
                        </div>

                        <button class="btn btn-default btn-cart">Add to cart</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
