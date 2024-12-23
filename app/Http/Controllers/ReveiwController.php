<?php

namespace App\Http\Controllers;

use App\Models\Reveiw;
use Illuminate\Http\Request;

class ReveiwController extends Controller
{
    public function index()
    {
        $flowers = Reveiw::with('stock')->get(); 
        return view('flowers.index', compact('flowers'));
    }
}
