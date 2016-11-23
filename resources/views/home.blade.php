@extends('layouts.app')

@section('content')
<div class="content-container content-with-carousel">
    @include('partials.carousel')
    <section id="services">
        <p class="hero text-center">
            Themes & Decor is a boutique events company based in Meerut that specialises in weddings, private parties,
            kids' parties and corporate events.
        </p>
        <ul class="list-inline list-services text-center">
            @foreach($servicesWithImages as $service)
                <li>
                    <a href="/service/{{ $service->slug }}">
                        @if(sizeof($service->images) > 0)
                            <img src="{{ $service->images[0]['path'] . $service->images[0]['name'] }}" alt="">
                        @endif
                        <div>
                            {{ $service->name }}
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
    @if(isset($offers) && $offers->count() > 0)
    <section id="offers">
        <ul class="list-inline">
            @foreach($offers as $offer)
                <li>
                    {{ $offer->name }}
                </li>
            @endforeach
        </ul>
    </section>
    @endif
    <section id="products">
        @include('app.products.carousel')
    </section>
</div>
@endsection
