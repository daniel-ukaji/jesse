<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Matches;
// use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.members.index', [
            'users' => User::latest()->filter(request(['orientation', 'gender', 'country', 'search']))->paginate(15),
            'allUsers' => User::all(),
            'title' => 'All users',
        ]);
    }

    public function sub_users()
    {
        $users = User::where('subscription', '!=', 'Free')->paginate(10);
        $subUsers = User::where('subscription', '!=', 'Free')->get(); //this variable is used to only get the count of users
        return view('admin.members.index', [
            'title' => 'Subscirbed users',
            'users' => $users,
            'allUsers' => $subUsers,
        ]);
    }

    public function foo(User $user)
    {
        return view('user.match.search_show', [
            'match' => $user
        ]);
    }

    public function show(User $user)
    {
        return view('admin.members.show', [
            'user' => $user
        ]);
    }
}
