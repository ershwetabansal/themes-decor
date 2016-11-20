@extends('layouts.app')

@section('content')
    <div class="content-container">
        <h2 class="title">
            {{ $product->name }}
        </h2>
        <div class="clearfix">
            <div class="pull-left">
                <ul class="list-unstyled list-images-vertical">
                    @foreach($images as $key=>$image)
                        <li class="item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ $image['path'] . $image['name'] }}" alt="..." width="200">
                        </li>
                    @endforeach
                </ul>

            </div>
            <p>
                {{ $product->price }} Rs
            </p>
            <button class="btn btn-success">
                Add to cart
            </button>

            <p>
                {{ $product->description }}
            </p>
        </div>
    </div>
@endsection
