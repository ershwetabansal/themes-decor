@extends('layouts.app')

@section('content')

<div class="content-container">
    <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked navigation-cover">
          <li role="presentation" class="active"><a data-toggle="tab" href="#themes">Themes</a></li>
          <li role="presentation"><a data-toggle="tab" href="#products">Products</a></li>
          <li role="presentation"><a data-toggle="tab" href="#offers">Offers</a></li>
          <li role="presentation"><a data-toggle="tab" href="#customize">Customize content</a></li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="themes">
                @include('admin.themes.index')
            </div>
            <div class="tab-pane fade" id="products">
                @include('admin.products.index')
            </div>
            <div class="tab-pane fade" id="offers">
                @include('admin.offers.index')
            </div>
            <div class="tab-pane fade" id="customize">
            	@include('admin.customize.index')
            </div>
        </div>  
    </div>
</div>
@endsection
