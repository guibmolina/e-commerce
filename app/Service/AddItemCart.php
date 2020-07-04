<?php


namespace App\Service;


use App\Item;

class AddItemCart
{
    public function addOnCart(Item $item)
    {
        $cart = session()->get('cart');

        // if cart is empty then this the first item
        if (!$cart) {
            $cart = [
                $item->id => [
                    "id" => $item->id,
                    "name" => $item->title,
                    "quantity" => 1,
                    "price" => $item->price,
                    "description" => $item->description
                ]
            ];
            session()->put('cart', $cart);
            return;
        }

        // if cart not empty then check if this item exist then increment quantity
        if (isset($cart[$item->id])) {
            $cart[$item->id]['quantity']++;
            session()->put('cart', $cart);
            return;
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$item->id] = [
            "id" => $item->id,
            "name" => $item->title,
            "quantity" => 1,
            "price" => $item->price,
            "description" => $item->description
        ];
        session()->put('cart', $cart);
        return;
    }
}
