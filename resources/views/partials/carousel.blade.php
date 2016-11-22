<section id="Carousel">

@if(isset($item) && $item->description)
    <div class="content">
        <div class="title">{{ $item->name }}</div>
        <div>{{ $item->descrdition }}</div>
    </div>
    <div class="content overlay">{{ $item->description }}</div>
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

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>
</section>