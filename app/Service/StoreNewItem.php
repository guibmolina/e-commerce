<?php


namespace App\Service;


use App\Item;

class StoreNewItem
{
    public function newItem($request, $cover) :string
    {
        $itemShop = new Item();
        $itemShop->title = $request->title;
        $itemShop->description = $request->description;
        $itemShop->specs = $request->specs;
        $itemShop->quantity = $request->quantity;
        $itemShop->price = $request->price;
        $itemShop->category_id = $request->category;
        $itemShop->filename = $cover;
        $itemShop->save();

        return $itemShop->title;
    }
}
