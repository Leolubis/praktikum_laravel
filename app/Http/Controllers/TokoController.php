<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;


class TokoController extends Controller
{
    public function index()
    {
        return view('toko/index');
    }

    public function detail()
    {
        return view('toko/detail');
    }

    public function aboutus()
    {
        return view('toko/aboutus');
    }

    public function admin()
    {
        $products = Produk::all();
        return view('toko/admin', compact('products'));
    }

    public function create()
    {
        return view('toko/create');
    }

    public function store(request $REQUEST)
    {
        $REQUEST->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
        ]);

        product::create($REQUEST->all());
        return redirect()->route('produk.admin')->with('success','product created successfully');
    }
}
