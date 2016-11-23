@extends('layouts.app')

@section('content')
    <div class="content-container">
        <h2 class="title">
            {{ $product->name }}
        </h2>
        <div class="row m-b-xl">
            <div class="col-md-2">
                <ul class="list-unstyled list-images-vertical">
                    @foreach($images as $key=>$image)
                        <li class="item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ $image['path'] . $image['name'] }}" alt="..." width="200">
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="col-md-6">
                <p>
                    {{ $product->description }}
                </p>
                <p>
                    {{ $product->price }} Rs
                </p>
            </div>
            <div class="col-md-4 text-right">
                <button class="btn btn-primary">
                    Add to cart
                </button>

            </div>
        </div>

        @include('app.products.carousel')
    </div>
@endsection
