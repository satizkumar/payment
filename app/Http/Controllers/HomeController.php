<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Product::all();
        return view('home')->with('products', $data);
    }

    public function detail($id)
    {
        $data = Product::find($id)->toArray();
        return view('detail')->with('products', $data);
    }

    public function charge(Request $request)
    {
               return view('detail')->with('response', $request->all());
    }
}
