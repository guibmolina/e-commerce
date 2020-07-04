<?php

namespace App\Http\Controllers;

use App\Events\BuyItemEvent;
use App\Events\CartEvent;
use App\Item;
use App\Service\AddItemCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * @param Item $item
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Item $item, Request $request)
    {
        $category = $item->categories()->first();
        return view('shop.item', [
            'item' => $item,
            'category' => $category,
            'mensagem' => $request->session()->get('mensagem'),
        ]);
    }

    /**
     * @param Item $item
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function checkout(Item $item, Request $request)
    {
        return view('shop.checkout', [
            'item' => $item,
            'mensagem' => $request->session()->get('mensagem'),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function buyItem(Request $request)
    {

        $cart = session()->get('cart');
        foreach ($cart as $product) {

            $item = Item::query()->where('id','=',$product['id'])->first();
            if( $product['quantity'] > $item->quantity ) {
                $request->session()->flash('mensagem', " Você está tentando comprar mais do que temos no estoque ");

                return redirect()->back();
            }

        }

        event(new BuyItemEvent($request->first_name,$request->email,$cart));

        $this->RemoveItemStock();
        session()->forget('cart');

        return redirect(route('shop.index'));
    }

    /**
     * @param Item $item
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function delete(Item $item, Request $request)
    {
        $item->delete();
        Storage::delete($item->filename);
        $request->session()->flash('mensagem', " {$item->title} foi removido");
        return redirect(route('shop.index'));
    }

    /**
     * @param Item $item
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function AddItemCart(Item $item, Request $request, AddItemCart $addItemCart)
    {
        $addItemCart->addOnCart($item);
        $request->session()->flash('mensagem', " {$item->title} foi adicionado ao carrinho");

        return redirect()->back();
    }

    /**
     * @param Item $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stock(Item $item)
    {
        return view('shop.stock', [
            'item' => $item,
        ]);
    }

    /**
     * @param Item $item
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function stockUpdate(Item $item, Request $request)
    {
        $item->quantity = $request->quantity;
        $item->save();
        return redirect()->route('shop.index');
    }

    public function RemoveItemStock(): void
    {
        $cart = session()->get('cart');
        foreach ($cart as $products) {
            $item = Item::query()->find($products['id']);
            $item->quantity -= $products['quantity'];
            $item->save();
        }
    }

    public function RemoveItemCart(Item $item)
    {

        $cart = session()->get('cart');

        if($cart[$item->id]['quantity'] > 1) {
            $cart[$item->id]['quantity']--;
            session()->put('cart', $cart);
            return redirect()->route('product.checkout');
        }

            unset($cart[$item->id]);
            session()->put('cart', $cart);
            return redirect()->route('product.checkout');



    }
}
