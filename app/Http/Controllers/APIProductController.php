<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class APIProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'products' => $products
        ];
        return $result;
    }

    public function show( Request $request )
    {
        $idProducts = explode(",", $request->id_products);

        $products = Product::whereIn('id', $idProducts)->get();

        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'price_total' => sumTotalFromProducts($products),
            'products' => $products
        ];
        return $result;
    }

}
