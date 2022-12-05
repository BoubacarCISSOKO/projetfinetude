<?php

namespace App\Http\Controllers;

use App\Models\Fleur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fleurs = Fleur::orderBy('created_at', 'desc');
        $fleurs = $fleurs->paginate(15);
        return view('home', compact("fleurs"));
    }

    public function admindashbord()
    {
        $fleurs = Fleur::orderBy('created_at', 'desc');
        $fleurs = $fleurs->paginate(15);
        return view('fleurs.index', compact('fleurs'));
    }

    
}
