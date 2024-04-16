<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class APITransactionController extends Controller
{

    public function getHome($user_id)
    {
        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditampilkan',
            'bills' => [],
            'cashs' => [],
            'credits' => [],
        ];

        $user = User::firstWhere('id', $user_id);

        if( $user->user_category == 'cashier' ) :

            $cashs = Transaction::with('user')->transactionsForThisMonth()->where('is_buyed', true)->orderBy('id', 'DESC')->limit(2)->get();

            for ($i=0; $i < count($cashs); $i++) {
                $cashs[$i]['date'] = $cashs[$i]['created_at']->isoFormat("DD/MM/YYYY HH:mm:ss");
            }

            $result['cashs'] = $cashs;

            $credits = Transaction::with('user')->transactionsForThisMonth()->where('is_buyed', false)->orderBy('id', 'DESC')->limit(2)->get();

            for ($i=0; $i < count($credits); $i++) {
                $credits[$i]['date'] = $credits[$i]['created_at']->isoFormat("DD/MM/YYYY HH:mm:ss");
            }

            $result['credits'] = $credits;

        elseif( $user->user_category == 'payer' ) :
            $cashs = Transaction::with('user')->transactionsForThisMonth()->where('is_buyed', true)->where('user_id', $user_id)->orderBy('id', 'DESC')->limit(2)->get();

            for ($i=0; $i < count($cashs); $i++) {
                $cashs[$i]['date'] = $cashs[$i]['created_at']->isoFormat("DD/MM/YYYY HH:mm:ss");
            }

            $result['cashs'] = $cashs;

            $bills = Transaction::with('user')->transactionsForThisMonth()->where('is_buyed', false)->where('user_id', $user_id)->orderBy('id', 'DESC')->limit(2)->get();

            for ($i=0; $i < count($bills); $i++) {
                $bills[$i]['date'] = $bills[$i]['created_at']->isoFormat("DD/MM/YYYY HH:mm:ss");
            }

            $result['bills'] = $bills;

        endif;



        return $result;

    }

    public function getCashs()
    {

        $transactions = Transaction::with('user')->transactionsForThisMonth()->where('is_buyed', true)->orderBy('id', 'DESC')->get();

        for ($i=0; $i < count($transactions); $i++) {
            $transactions[$i]['date'] = $transactions[$i]['created_at']->isoFormat("DD/MM/YYYY HH:mm:ss");
        }

        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'transactions' => $transactions
        ];

        return $result;

    }

    public function getCashsByUser($user_id)
    {

        $transactions = Transaction::with('user')->transactionsForThisMonth()->where('is_buyed', true)->where('user_id', $user_id)->orderBy('id', 'DESC')->get();

        for ($i=0; $i < count($transactions); $i++) {
            $transactions[$i]['date'] = $transactions[$i]['created_at']->isoFormat("DD/MM/YYYY HH:mm:ss");
        }

        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'transactions' => $transactions
        ];

        return $result;

    }

    public function showCash($transactionId)
    {
        $transaction = Transaction::with('user', 'purchases.product')->where('id', $transactionId)->where('is_buyed', true)->first();

        $transaction['date'] = $transaction->created_at->isoFormat("DD/MM/YYYY HH:mm:ss");

        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'transactions' => [$transaction]
        ];

        return $result;
    }

    public function getCredits()
    {
        $transactions = User::creditWithTransactionsForThisMonth()->where('user_category', '!=', 'administrator')->get();

        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'transactions' => []
        ];

        foreach ($transactions as $transaction){
            $result['transactions'][] = [
                'id' => $transaction->id,
                'buyer_name' => $transaction->buyer_name,
                'payer_name' => $transaction->payer_name,
                'transaction_price_total'=> sumTotalFromTransaction($transaction->transactions)
            ];
        }

        return $result;
    }

    public function getCreditsByUser($user_id)
    {

        $transaction = User::creditWithTransactionsForThisMonth()->where('user_category', '!=', 'administrator')->where('id', $user_id)->first();
        $transactionByUser = $transaction->transactions;

        for ($i=0; $i < count($transactionByUser); $i++) {
            $transactionByUser[$i]['date'] = $transactionByUser[$i]->created_at->isoFormat("DD/MM/YYYY HH:mm:ss");
        }

        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'price_transaction_total' => sumTotalFromTransaction($transactionByUser),
            'transactions' => $transactionByUser
        ];

        return $result;
    }

    public function showCredit($userId)
    {
        $transaction = User::creditWithTransactionsForThisMonth()->where('user_category', '!=', 'administrator')->where('id', $userId)->first();
        // $transaction['date'] = $transaction->created_at->isoFormat("DD/MM/YYYY HH:mm:ss");
        $transaction['transaction_price_total'] = sumTotalFromTransaction($transaction->transactions);

        $credits = $transaction->transactions;
        for ($i=0; $i < count($credits); $i++) {
            $credits[$i]['date'] = $credits[$i]->created_at->isoFormat("DD/MM/YYYY HH:mm:ss");
        }
        $transaction['transactions'] = $credits;



        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'transactions' => [ $transaction ]
        ];

        return $result;

    }

    public function showCreditById($transactionId)
    {
        $transaction = Transaction::with('user', 'purchases.product')->where('id', $transactionId)->where('is_buyed', false)->first();

        $transaction['date'] = $transaction->created_at->isoFormat("DD/MM/YYYY HH:mm:ss");

        $result = [
            'status' => 200,
            'message' => 'Data berhasil ditemukan',
            'transactions' => [$transaction]
        ];

        return $result;
    }

    public function store( Request $request )
    {
        $userId = $request->user_id;
        $isBuyed = boolval($request->is_buyed);

        $idProducts = explode(',', $request->id_products);
        $idProducts = array_filter($idProducts, 'strlen');

        $amountProducts = explode(',', $request->amount_products);
        $amountProducts = array_filter($amountProducts, 'strlen');

        $products = Product::whereIn('id', $idProducts)->get();

        $date = Carbon::now();
        $priceTransactionTotal = 0;

        $purchases = [];

        for ($i = 0; $i < count($products); $i++) {
            $priceProduct = $products[$i]->price;
            $priceTotal = $priceProduct * $amountProducts[$i];
            $priceTransactionTotal += $priceTotal;
            $purchases[] = [
                'product_id' => $idProducts[$i],
                'amount' => $amountProducts[$i],
                'price_total' => $priceTotal,
                'created_at' => $date,
                'updated_at' => $date,
            ];
        }

        # store transaction data and save the id
        $transactionId = Transaction::insertGetId([
            'user_id' => $userId,
            'price_transaction_total' => $priceTransactionTotal,
            'is_buyed' => $isBuyed,
            'created_at' => $date,
            'updated_at' => $date,
        ]);

        # store purchases data
        for ($i = 0; $i < count($purchases); $i++) {
            $purchases[$i]['transaction_id'] = $transactionId;
        }
        Purchase::insert($purchases);

        # update product stock
        for ($i=0; $i < count($idProducts); $i++) {
            Product::find($idProducts[$i])->decrement('stock', $amountProducts[$i]);
        }


        $result = [
            'status' => 200,
            'message' => 'Transaksi berhasil dilakukan',
            'transactions' => []
        ];

        return $result;
    }


}
