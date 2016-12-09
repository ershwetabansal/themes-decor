<section id="Carousel">

@if(isset($item))
    <div class="content">
        <div class="title text-center">{{ $item->name }}</div>
        @if($item->description)
            <div class="overlay text-center">{{ $item->description }}</div>
        @endif
    </div>
@endif

<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($images as $key=>$image)
            <li data-target="#carousel" data-slide-to="{{ $key }}"
                @if ($key == 0) class="active" @endif></li>
        @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        @foreach($images as $key=>$image)
            <div class="item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ $image['path'] . $image['name'] }}" alt="..." height="800" width="800">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
        @endforeach
    </div>
</div>
</section>