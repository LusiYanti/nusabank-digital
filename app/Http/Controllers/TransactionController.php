<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $account = Auth::user()->account;

        $transactions = $account->sentTransactions()
            ->with('receiver.user')
            ->get()
            ->merge(
            $account->receivedTransactions()
            ->with('sender.user')
            ->get()
            )
            ->sortByDesc('created_at');
        return view('transactions', compact('transactions'));
    }
}