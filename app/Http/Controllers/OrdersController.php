<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fleur;
use App\Models\User;
use App\Models\Order;
use Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Notification;
use App\Notifications\InformationCommande;

class OrdersController extends Controller
{
    //
    public function index()
    {
        $products = Fleur::all();
        $cartCollection = \Cart::getContent();
        return view('commande.index', compact('products','cartCollection'));
    }

    public function store(Request $request)
    {
        //
        $orders = new Order;

        $orders->order_number = 'Commande IsepShop-'.strtoupper(uniqid());
        $orders->user_id = auth()->user()->id;
        $orders->grand_total = Cart::getTotal();
        $orders->item_count = Cart::getTotalQuantity();
        $orders->payment_status = 0;
        $orders->payment_method = $request->input('payment_method');
        $orders->prenom = $request->prenom;
        $orders->nom = $request->nom;
        $orders->address = $request->address;
        $orders->city = $request->city;
        $orders->country = $request->country;
        $orders->phone = $request->phone;
        $orders->status = $request->status;

        if ($request->payment_method=="PostePay") {
            $orders->status = "processing";

        }elseif ($request->payment_method=="Virement") {
            $orders->status = "processing";
            
        }else {
            $orders->status = "pending";
        }
        $orders->save();
        Cart::clear();
        Cart::session($request->user())->clear(); 

        return redirect()->route('commande.confirmation')->with('info', 'Commande bien enrégistrée !');
    }

    public function confirmation(Request $request)
    {
        $products = Fleur::all();
        $cartCollection = \Cart::getContent();
       return view('commande.confirmation', compact('products','cartCollection'));
    }
}
 