<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $year = $request->year;
        $month = $request->month;

        return view('layouts.reports.index', [
            'title' => 'Laporan Bulanan - Koperasi MINDA',
            'products' => Product::transactionReport($month, $year)->orderBy('name', 'ASC')->get()
        ]);
    }

    public function print(Request $request)
    {
        $year = $request->year;
        $month = $request->month;

        return view('layouts.reports.print', [
            'title' => 'Laporan Bulanan - Koperasi MINDA',
            'products' => Product::transactionReport($month, $year)->orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
