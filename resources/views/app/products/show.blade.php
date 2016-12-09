@extends('layouts.app')

@section('content')
    <div class="content-container">
                <div class="row m-b-xl">
            <div class="col-md-2">
                <ul class="list-unstyled list-images-vertical">
                    @foreach($images as $key=>$image)
                        <li class="item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ $image['path'] . $image['name'] }}" alt="..." data-type="image-mini" data-update="image-max">
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 text-center">
                @if(sizeof($images) > 0)
                <img src="{{ $images[0]['path'] . $images[0]['name']}}" alt="" width="100%" data-type="image-max"/>
                @endif
            </div>
            <div class="col-md-3 col-md-offset-2">
                <h2>
                    {{ $product->name }}
                </h2>
                <form method="post" action="{{ url('/cart/store') }}" data-form="cart">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        @if($product->discount)
                            <span class="text-discount">{{ $product->discount }}</span>
                        @endif
                        <input type="hidden" name="quantity" value="1">
                        <p class="price">
                            {{ $product->price }} /- &nbsp;&nbsp; Rs
                        </p>
                        <button class="btn btn-primary btn-block" style="margin-bottom: 2em;">
                            <img src="/images/site/loading.gif" alt="Loading" class="hidden" data-type="loading">
                            Add to cart
                        </button>
                        <span class="{{ $product->addedToCart ? '' : 'hidden' }}" data-type="success">Added to the cart</span>
                        <h4>Description</h4>
                        <p>
                            {{ $product->description }}
                        </p>
                        
                    </form>
            </div>
            
        </div>

        @include('app.products.carousel')
    </div>
@endsection
