<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.transactions.cash.index', [
            'title' => 'Data Transaksi Tunai - Koperasi MINDA',
            'transactions' => Transaction::with('user')->where('is_buyed', true)->get()
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
    public function show($transaction)
    {
        $transaction = Transaction::find($transaction);
        return view('layouts.transactions.cash.show', [
            'title' => 'Detail Transaksi Tunai - Koperasi MINDA',
            'transaction' => $transaction->load('purchases.product', 'user')
        ]);
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
