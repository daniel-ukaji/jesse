<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matches;
use Illuminate\Http\Request;
use App\Models\Subscriptions;

class SubscriptionsController extends Controller
{
    public function manageSubs()
    {
        return view('admin.subscriptions.index', [
            'users' => User::latest()->get(),
            'subs' => Subscriptions::all(),
            'matches' => Matches::with(['user', 'matched_user'])->latest()->get()
        ]);
    }

    public function index()
    {
        return view('user.subscriptions.index', [
            'subs' => Subscriptions::all(),
        ]);
    }

    public function create()
    {
        return view('admin.subscriptions.create');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'subscription_type' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        Subscriptions::create($credentials);

        return redirect(route('manage.subs'))->with('status', 'New Subscription Added');
    }


    public function edit(Subscriptions $sub)
    {
        return view('admin.subscriptions.edit', [
            'sub' => $sub,
        ]);
    }

    public function update(Request $request, Subscriptions $sub)
    {
        $credentials = $request->validate([
            'subscription_type' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $sub->update($credentials);
        return back()->with('status', 'Subscription edited successfully');
    }

    public function delete(Subscriptions $sub)
    {
        $sub->delete();
        return redirect(route('manage.subs'))->with('error', 'Subscription deleted');
    }
}
