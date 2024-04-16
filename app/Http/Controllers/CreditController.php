<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.transactions.credit.index', [
            'title' => 'Data Transaksi Kreddit - Koperasi MINDA',
            'users' => User::creditWithTransactionsForThisMonth()->where('user_category', '!=', 'administrator')->get()
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
    public function show($userId)
    {
        return view('layouts.transactions.credit.show', [
            'title' => 'Detail Transaksi Kredit - Koperasi MINDA',
            'user' => User::creditWithTransactionsForThisMonth()->where('user_category', '!=', 'administrator')->where('id', $userId)->first()
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
    public function update(Request $request, $userId)
    {
        Transaction::
            transactionsForThisMonth()
            ->where('user_id', $userId)
            ->update(['is_buyed' => true]);

        return redirect('/admin/transactions/cash')->with('success', 'Data pembayaran kredit telah dikonfirmasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
