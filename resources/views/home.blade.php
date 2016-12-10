@extends('layouts.app')

@section('content')
<div class="content-container content-with-carousel">
    @include('partials.carousel')
    <section id="services">
        <p class="hero text-center">
            {{ \App\Configuration::getValue('home_content', '') }}
        </p>
        
        <div id="service-carousel" class="carousel slide">
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
            @foreach($servicesWithImages->chunk(3) as $key=> $chunk)
            <div class="item {{ $key == 0 ? 'active' : '' }}">
                <ul class="list-inline list-services text-center">
                @foreach($chunk as $service)
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
            </div>
            @endforeach
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#service-carousel" role="button" data-slide="prev">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#service-carousel" role="button" data-slide="next">
                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section id="vision">
        <div class="background"></div>
        <div class="content">
            {!! \App\Configuration::getValue('vision', '') !!}
        </div>

    </section>

    <section id="packages" >

    <h2 class="text-center">Decoration starting from 11000/- only</h2>
    
    <div style="width: 84%;margin: 0 auto;text-align: center;position: relative">
        <table class="table-packages">
        <tbody>
            <tr>
                @foreach($packages as $package)
                    <td valign="bottom" title="{{ $package->title }}" data-toggle="tooltip">
                        <div class="{{ $package->slug }}">
                            {{ $package-> name }}
                        </div>
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
        <div class="packages">
            @foreach($packages as $package)
                <div class="{{ $package->slug }}">
                    {{ $package-> name }}
                </div>
            @endforeach
        </div>
        <div class="package-title">
            OUR PACKAGES
        </div>        
    </div>
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

    <section id="products" data-toggle="list-carousel">
        <a class="control left disabled" role="button" data-slide="prev">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
        </a>
        @include('app.products.list')    
        <a class="control right" role="button" data-slide="next">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
        </a>
    </section>
</div>
@endsection
