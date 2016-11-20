@extends('layouts.app')

@section('content')
    <div class="content-container">
        <div class="row">
            <div class="col-md-8">
                <h2>Shopping Basket</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th width="50%"></th>
                        <th>Price</th>
                        <th width="20%">Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>
                                @if(sizeof( $item->product->images) > 0 && $image = $item->product->images[0])
                                <img src="{{ $image['path'] . $image['name'] }}" alt="{{ $item->name }}"
                                style="max-width: 100%;height: 45px;">
                                @endif
                            </td>
                            <td>
                                <a href="/product/{{ $item->product->slug }}">{{ $item->product->name }}</a>
                            </td>
                            <td>
                                {{ $item->price }}
                            </td>
                            <td>

                                <div class="input-group">
                                    <span class="input-group-addon" data-type="decrement"
                                          data-update="{{ $item->rowId }}_quantity">-</span>
                                    <input type="number" value="{{ $item->qty }}" class="form-control text-center"
                                           data-type="{{ $item->rowId }}_quantity" name="quantity" data-id="{{ $item->rowId }}"/>
                                    <span class="input-group-addon" data-type="increment"
                                          data-update="{{ $item->rowId }}_quantity">+</span>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-md-4">

            </div>

        </div>
    </div>
@endsection
