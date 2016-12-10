<?php

namespace App\Http\Controllers\Website;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
     * Show the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::content();

        $products = Product::paginate();
        $products->each(function($product) use ($cartItems) {
            $product->images = $this->browser->listFilesIn($this->path . $product->slug);
            $product->addedToCart = $cartItems->filter(function ($item) use($product) {
                return $item->id == $product->id;
            })->count() > 0;
        });

        return view('app.products.index', compact('products'));
    }


    /**
     * Show the product details.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $cartItems = Cart::content();
        $product->addedToCart = $cartItems->filter(function ($item) use($product) {
                return $item->id == $product->id;
        })->count() > 0;
        $images = $this->browser->listFilesIn($this->path . $product->slug);

        $products = Product::orderBy('created_at', 'desc')->limit(10)->get();
        $products->map(function ($product) {
            $product->images =   $this->browser->listFilesIn('/products/' . $product->slug);
        });
        return view('app.products.show', compact('product', 'images', 'products'));
    }


}
