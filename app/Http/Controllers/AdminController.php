<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Subscriptions;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'users' => User::latest()->get(),
            'subs' => Subscriptions::all(),
            'matches' => Matches::where('status', 'accepted')->with(['user', 'matched_user'])->latest()->get(),
            'pending' => Matches::where('status', 'pending')->with(['user', 'matched_user'])->latest()->get(),
        ]);
    }
}
