<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionsRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with(['product', 'users'])->where('user_id', Auth::user()->id)->get();
        return view('pages.cart', [
            'cart' => $cart
        ]);
    }

    public function add(Request $request, $id, $quantity = 1)
    {
        $user_id = Auth::user()->id;

        // Check if the product already exists in the cart for the current user
        $CartItem = Cart::where('user_id', $user_id)
            ->where('product_id', $id)
            ->first();

        if ($CartItem) {
            // If the product already exists, update the quantity
            $CartItem->update([
                'quantity' => $CartItem->quantity + $quantity,
            ]);
        } else {
            // If the product doesn't exist, create a new cart item
            Cart::create([
                'product_id' => $id,
                'user_id' => $user_id,
                'quantity' => $quantity,
            ]);
        }
        return redirect('/');
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete($id);

        return redirect()->route('cart');
    }

    public function success()
    {
        return view('pages.success');
    }
}
