@extends('layouts.app')

@section('content')
    <h2 class="title text-center">
        {{ $page->title }}
    </h2>
    <div class="content-container content-page text-center">

        <div class="content">
            {!! $page->content !!}
        </div>
    </div>
@endsection
