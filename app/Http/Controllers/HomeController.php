<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::with(['category'])->get();
        return view('pages.home', [
            'product' => $product,
        ]);
    }
}
