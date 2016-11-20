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
                            <img src="{{ $image['path'] . $image['name'] }}" alt="{{ $product->name }}"/>
                        @endif
                        <h2 class="text-truncate">
                            <a href="/product/{{ $product->slug }}" target="_blank">
                                {{ $product->name }}
                            </a>
                        </h2>
                        <span class="price">
                        {{ $product->price }} Rs
                        </span>
{{--                        {{ TODO:: On hover of cart button, you can display the quantity field }}--}}
                        <button class="btn btn-primary btn-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
