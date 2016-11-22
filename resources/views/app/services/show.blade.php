@extends('layouts.app')

@section('content')
    <div class="content-container content-with-carousel">
        <section id="Carousel">
            @if($service->description)
                <div class="content">
                    <div class="title">{{ $service->name }}</div>
                    <div>{{ $service->description }}</div>
                </div>
                <div class="content overlay">{{ $service->description }}</div>
            @endif
            @include('partials.carousel')
        </section>
    </div>
@endsection
