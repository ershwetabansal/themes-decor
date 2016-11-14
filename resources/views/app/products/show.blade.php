@extends('layouts.app')

@section('content')
    <div class="container content-container">
        <h2 class="title">
            {{ $product->name }}
        </h2>
        <section id="Carousel">
            @if($product->description)
                <div class="content">
                    {{ $product->description }}
                </div>
                <div class="content overlay">{{ $product->description }}</div>
            @endif
            @include('partials.carousel')
        </section>
    </div>
@endsection
