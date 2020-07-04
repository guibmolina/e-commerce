<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Factory\ItemFactory;
use App\Item;
use App\Service\StoreNewItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            $userName = Auth::user()->name;
        } else {
            $userName = '';
        }
        $item = new Item();
        $items = $item->allAvailableItems();
        $categories = Categorie::all();

        return view('shop.index', [
            'items' =>  ($items->isEmpty()) ? '' : $items,
            'categories' => ($categories->isEmpty()) ? '' : $categories,
            'userName' => $userName,
            'mensagem' => $request->session()->get('mensagem'),
        ]);
    }

    public function formAddProduct()
    {
        $categories = Categorie::all();
        return view('shop.formAddProduct',[
            'categories' => $categories
        ]);
    }
    public function storeItem(Request $request, StoreNewItem $newItem)
    {
        $cover = null;

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('productCover');
        }

        $item = $newItem->newItem($request,$cover);

        $request->session()->flash(
            "mensagem",
            "O item {$item} foi adicionado com sucesso"
        );
        return redirect()->route('shop.index');
    }

    public function unavailable()
    {
        $item = new Item();
        $items = $item->unallAvailableItems();

        return view('shop.failedstock',[
            'items' => ($items->isEmpty()) ? '' : $items
        ]);
    }
}
