<?php

namespace App\Http\Controllers\Website;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->path = '/products/';
    }

    /**
     * Store the products in Cart.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $product = Product::where('id', $request->input('id'))->firstOrFail();

        $cart = Cart::add($product->id, $product->name, $request->input('quantity'), $product->price, ['size' => 'large']);

        return [
            'success'   => true,
            'message'   => 'Added successfully',
            'count'     => Cart::content()->count(),
        ];
    }

    /**
     * Update the products in Cart.
     *
     * @param Request $request
     * @return array
     */
    public function update(Request $request)
    {
        Cart::update($request->input('id'), $request->input('quantity'));

        return [
            'success'   => true,
            'message'   => 'Added successfully',
            'count'     => Cart::content()->count(),
        ];
    }

    /**
     * Update the products in Cart.
     *
     * @param Request $request
     * @return array
     */
    public function destroy(Request $request)
    {
        Cart::remove($request->input('id'));

        return [
            'success'   => true,
            'message'   => 'Added successfully',
            'count'     => Cart::content()->count(),
        ];
    }

    /**
     * Display the list of selected items in the cart.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cartItems = Cart::content();

        $cartItems->each(function($item) {
           $item->product = Product::where('id', $item->id)->firstOrFail();
           $item->product->images = $this->browser->listFilesIn($this->path . $item->product->slug);
        });
        return view('app.checkout.index', compact('cartItems'));
    }
}
