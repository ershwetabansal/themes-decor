@extends('layouts.app')

@section('content')

    <section id="admin">
        <div class="content-container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked navigation-cover" id="sidebar">
                        <li role="presentation" class="active"><a data-toggle="tab" href="#themes">Themes</a></li>
                        <li role="presentation"><a data-toggle="tab" href="#services">Services</a></li>
                        <li role="presentation"><a data-toggle="tab" href="#products">Products</a></li>
                        <li role="presentation"><a data-toggle="tab" href="#offers">Offers</a></li>
                        <li role="presentation"><a data-toggle="tab" href="#pages">Pages</a></li>
                        <li role="presentation"><a data-toggle="tab" href="#packages">Packages</a></li>
                        <li role="presentation"><a data-toggle="tab" href="#customize">Customize content</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="themes">
                            <a data-toggle="tab" data-target="#themes_create" class="btn btn-default">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add new theme
                            </a>
                            @include('admin.themes.index')
                        </div>
                        <div class="tab-pane fade" id="services">
                            <a data-toggle="tab" data-target="#services_create" class="btn btn-default">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add new service
                            </a>
                            @include('admin.services.index')
                        </div>
                        <div class="tab-pane fade" id="products">
                            <a data-toggle="tab" data-target="#products_create" class="btn btn-default">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add new product
                            </a>
                            @include('admin.products.index')
                        </div>
                        <div class="tab-pane fade" id="offers">
                            <a data-toggle="tab" data-target="#offers_create" class="btn btn-default">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add new offer
                            </a>
                            @include('admin.offers.index')
                        </div>
                        <div class="tab-pane fade" id="pages">
                            <a data-toggle="tab" data-target="#pages_create" class="btn btn-default">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add new page
                            </a>
                            @include('admin.pages.index')
                        </div>
                        <div class="tab-pane fade" id="packages">
                            <a data-toggle="tab" data-target="#packages_create" class="btn btn-default">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Add new package
                            </a>
                            @include('admin.packages.index')
                        </div>
                        <div class="tab-pane fade" id="customize">
                            @include('admin.customize.index')
                        </div>
                        <div class="tab-pane fade" id="services_create">
                            @include('admin.services.create')
                            <a data-target="#themes" data-toggle="tab" class="pull-right">Go back</a>
                        </div>
                        <div class="tab-pane fade" id="themes_create">
                            @include('admin.themes.create')
                            <a data-target="#themes" data-toggle="tab" class="pull-right">Go back</a>
                        </div>
                        <div class="tab-pane fade" id="products_create">
                            @include('admin.products.create')
                            <a data-target="#products" data-toggle="tab" class="pull-right">Go back</a>
                        </div>
                        <div class="tab-pane fade" id="pages_create">
                            @include('admin.pages.create')
                            <a data-target="#pages" data-toggle="tab" class="pull-right">Go back</a>
                        </div>
                        <div class="tab-pane fade" id="packages_create">
                            @include('admin.packages.create')
                            <a data-target="#packages" data-toggle="tab" class="pull-right">Go back</a>
                        </div>
                        <div class="tab-pane fade" id="offers_create">
                            @include('admin.offers.create')
                            <a data-target="#offers" data-toggle="tab" class="pull-right">Go back</a>
                        </div>
                        @foreach($services as $service)
                            <div class="tab-pane fade" id="services_update_{{ $service->id }}">
                                @include('admin.services.update')
                                <a data-target="#services" data-toggle="tab" class="pull-right">Go back</a>
                            </div>
                        @endforeach

                        @foreach($themes as $theme)
                            <div class="tab-pane fade" id="themes_update_{{ $theme->id }}">
                                @include('admin.themes.update')
                                <a data-target="#themes" data-toggle="tab" class="pull-right">Go back</a>
                            </div>
                        @endforeach

                        @foreach($products as $product)
                            <div class="tab-pane fade" id="products_update_{{ $product->id }}">
                                @include('admin.products.update')
                                <a data-target="#products" data-toggle="tab" class="pull-right">Go back</a>
                            </div>
                        @endforeach

                        @foreach($pages as $page)
                            <div class="tab-pane fade" id="pages_update_{{ $page->id }}">
                                @include('admin.pages.update')
                                <a data-target="#pages" data-toggle="tab" class="pull-right">Go back</a>
                            </div>
                        @endforeach

                        @foreach($packages as $package)
                            <div class="tab-pane fade" id="package_update_{{ $package->id }}">
                                @include('admin.packages.update')
                                <a data-target="#packages" data-toggle="tab" class="pull-right">Go back</a>
                            </div>
                        @endforeach

                        @foreach($offers as $offer)
                            <div class="tab-pane fade" id="offers_update_{{ $offer->id }}">
                                @include('admin.offers.update')
                                <a data-target="#offers" data-toggle="tab" class="pull-right">Go back</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles_scripts')
<link rel="stylesheet" href="/css/diskbrowser/disk-browser.css">
@endpush

@push('body_scripts')
<script src="js/diskbrowser/js/disk-browser.js"></script>
<script src="{{ elixir('js/disk_browser.js') }}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
(function(){
    tinymce.init({ selector:'textarea' });
    })()</script>
@endpush
