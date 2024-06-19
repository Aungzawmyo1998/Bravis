<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public function render()
    {
        return view('livewire.cart');
    }

    public function incrementQty() {

        dump("445");
        $cart = session()->get('cart');

        // if( isset($cart[$id])) {
        //     $cart[$id]["qty"] ++;
        // }

    }
    public function decrementQty($id) {

    }

    public function click() {
        dump("hello");
    }
}
