@extends('layouts.app')

@section('content')
    <div class="content-container">
        @include('app.products.list')

         {{ $products->links() }}
    </div>
@endsection
