<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function addToCart(Request $request)
{
    $product = Produit::findOrFail($request->input('idproduit'));
    $quantity = $request->input('quantity');

    // Check if the cart exists in the session
    if (!$request->session()->has('cart')) {
        $request->session()->put('cart', []);
    }

    $cart = $request->session()->get('cart');

    // Check if the product already exists in the cart
    if (array_key_exists($product->idproduit, $cart)) {
        // If the product already exists, update the quantity
        $cart[$product->idproduit]['quantity'] += $quantity;
    } else {
        // If the product does not exist, add it to the cart
        $cart[$product->idproduit] = [
            'produit' => $product,
            'quantity' => $quantity,
        ];
    }

    $request->session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product added to cart.');
}


}
