@extends('layouts.app', [
    'checkout'  => true
])

@section('content')
    <div class="content-container">
        <div class="row">
            <div class="col-md-8">
                <h2>Shopping Basket</h2>

            </div>
            <div class="col-md-4 text-right">
                <a class="btn btn-primary">
                    Proceed to checkout
                </a>
                <a class="btn btn-info" href="/shop">
                    Continue shopping
                </a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
                <th>Product</th>
                <th>Price</th>
                <th width="12%">Quantity</th>
                <th></th>
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
                    <td>
                        <button class="btn btn-link" data-type="remove" data-id="{{ $item->rowId }}"
                        >Remove</button>
                        |
                        <button class="btn btn-link" data-type="move" data-id="{{ $item->rowId }}"
                        >Save for later</button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
