@extends('layouts.app')

@section('content')
<div class="content-container content-with-carousel">
    @include('partials.carousel', [
                'item'  => $theme
            ])
</div>
@endsection
