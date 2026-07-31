<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        $totalAccounts = Account::count();

        $totalTransactions = Transaction::count();

        $totalBalance = Account::sum('balance');
        
        $users = User::with('account')->where('role', 'user')->get();

        $transactions = Transaction::with([
        'sender.user',
        'receiver.user'
        ])
        ->latest()
        ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAccounts',
            'totalTransactions',
            'totalBalance',
            'users',
            'transactions'
        ));
    }
}