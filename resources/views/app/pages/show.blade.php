@extends('layouts.app')

@section('content')
    <h2 class="title">
        {{ $page->title }}
    </h2>
    <div class="content-container content-page">

        <div class="content">
            {!! $page->content !!}
        </div>
    </div>
@endsection
