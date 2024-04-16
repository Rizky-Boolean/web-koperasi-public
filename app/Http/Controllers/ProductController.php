<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.products.index', [
            'title' => 'Data Produk - Koperasi MINDA',
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.products.create', [
            'title' => 'Tambah Data Produk - Koperasi MINDA'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'product_number' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'unit' => 'required',
        ]);

        Product::create($validated);

        return redirect('/admin/products')->with('success', 'Data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('layouts.products.show', [
            'title' => 'Detail Data Produk - Koperasi MINDA',
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('layouts.products.edit', [
            'title' => 'Edit Data Produk - Koperasi MINDA',
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_number' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'unit' => 'required',
        ]);

        Product::find($product->id)->update($validated);

        return redirect('/admin/products')->with('success', 'Data produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::find($product->id)->delete();

        return redirect('/admin/products')->with('success', 'Data produk berhasil dihapus');
    }
}
