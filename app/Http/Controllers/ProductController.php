<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
       $products = Cache::remember('products',3600,function(){
        return Product::all();
       });
       //$products =Product::all();
       return response()->json($products);
    }
}
