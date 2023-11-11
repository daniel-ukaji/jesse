<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Matches;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $matches = Matches::where('matchedUser_id', Auth::id())->count();

        $last_match = Matches::where('user_id', Auth::id())->latest()->first();
        $last_match ? ($md = $last_match->created_at->format('j M Y, g:i a')) : $md = "No Activity";

        $age = $user->date_of_birth;
        $dateOfBirth = new DateTime($age);
        $currentDate = new DateTime();
        $display_age = $currentDate->diff($dateOfBirth)->y;

        return view('user.home', [
            'user' => $user,
            'matches' => $matches,
            'md' => $md,
            'age' => $display_age
        ]);
    }
}
