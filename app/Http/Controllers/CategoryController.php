<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Item;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
      return view('shop.formAddCateg');
    }

    public function store(Request $request)
    {
        $category = new Categorie();
        $category->create($request->except(['token']));

        $request->session()->flash('mensagem','Categoria cadastrada');

        return redirect()->route('shop.index');
    }

    public function delete(Categorie $categorie) {

        $categorie->delete();

        return redirect()->route('shop.index');

    }

    public function showProducts(Categorie $category, Request $request)
    {
       $items = $category->getallAvailableItems();
       $categories = Categorie::all();

       if($items) {
           return view('shop.index', [
               'items' =>  ($items->isEmpty()) ? '' : $items,
               'categories' => $categories
           ]);
       }
       $request->session()->flash('mesagem', 'Não possui produtos');
       return redirect()->route('shop.index');
    }
}
