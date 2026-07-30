<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    public function index()
    {
        return view('transfer');
    }


    public function store(Request $request)
    {
        $request->validate([
            'account_number' => 'required',
            'amount' => 'required|numeric|min:1000',
        ]);


        $sender = Auth::user()->account;


        $receiver = Account::where(
            'account_number',
            $request->account_number
        )->first();


        if (!$receiver) {
            return back()->with('error', 'Nomor rekening tujuan tidak ditemukan');
        }


        if ($sender->balance < $request->amount) {
            return back()->with('error', 'Saldo tidak mencukupi');
        }


        DB::transaction(function () use ($sender, $receiver, $request) {

            // kurangi saldo pengirim
            $sender->balance -= $request->amount;
            $sender->save();


            // tambah saldo penerima
            $receiver->balance += $request->amount;
            $receiver->save();


            // simpan transaksi
            Transaction::create([
                'sender_account_id' => $sender->id,
                'receiver_account_id' => $receiver->id,
                'amount' => $request->amount,
                'description' => $request->description,
            ]);

        });


        return redirect('/dashboard')
            ->with('success', 'Transfer berhasil');
    }
}