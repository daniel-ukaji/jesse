<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class MatchesController extends Controller
{
    public function index()
    {
        return view('user.match.index', [
            'matches' => Matches::where('user_id', Auth::id())->with(['user', 'matched_user'])->get(),
            'requests' => Matches::where('matchedUser_id', Auth::id())->with(['user', 'matched_user'])->get()
        ]);
    }

    public function show(Matches $match)
    {
        return view('user.match.show', [
            'match' => $match
        ]);
    }

    public function showUser(Matches $profile)
    {
        return view('user.match.template_show', [
            'match' => $profile
        ]);
    }

    public function store(Request $request)
    {
        try {
            $credentials = $request->validate([
                'matchedUser_id' => 'required',
                'match_info' => 'required',
            ]);

            if (Matches::where('matchedUser_id', $credentials['matchedUser_id'])->exists()) {
                return redirect(route('dashboard'))->with('error', "Cannot match same user multiple times");
            }

            $request->user()->matches()->create($credentials);
            return redirect(route('match.index'))->with('status', 'Match Saved!');
        } catch (\Exception $e) {
            return redirect(route('dashboard'))->with('error', 'Something went wrong!');
        }
    }

    public function update(Request $request, Matches $match)
    {
        try {
            $credentials = $request->validate([
                'status' => "required",
            ]);
            $match->update($credentials);
            return back();
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function match()
    {
        $from="";
        $to="";
        $age="";
        $gender = Auth::user()->seeks->gender;
        $orientation = Auth::user()->seeks->sexual_orientation;
        $looking_for = Auth::user()->seeks->rel_type;
        
        if(Auth::user()->seeks->age !='N/A'){
            
            $age=explode(',',Auth::user()->seeks->age);
        $from=Carbon::now()->subYears($age[0])->toDateString();
        $to=Carbon::now()->subYears($age[1])->toDateString();
        }
        $body= Auth::user()->seeks->body_type;
        
        if ($looking_for != 'N/A') {
           
            if(Auth::user()->seeks->age !=='N/A'){
                $user_search = User::where([
                    ['gender', '=', "$gender"],
                    ['orientation', '=', "$orientation"],
                    ['looking_for', '=', "$looking_for"],
                    ['id', '!=', Auth::id()],
                    ['email_verified_at', '!=', null],
                ])
                ->whereBetween('date_of_birth',[$to,$from])
                ->inRandomOrder()->paginate(10);
                
            }
            else{
                
                $user_search = User::where([
                    ['gender', '=', "$gender"],
                    ['orientation', '=', "$orientation"],
                    ['looking_for', '=', "$looking_for"],
                    ['id', '!=', Auth::id()],
                    ['email_verified_at', '!=', null],
                ])->inRandomOrder()->paginate(10);

            }
            
              
            return view('user.match.matches', [
                'matches' => $user_search,
            ]);
        } else {
            
            if(Auth::user()->seeks->age !='N/A'){
                    $user_search = User::where([
                        ['gender', '=', "$gender"],
                        ['orientation', '=', "$orientation"],
                        ['id', '!=', Auth::id()],
                        ['email_verified_at', '!=', null],
                    ])
                    ->whereBetween('date_of_birth',[$to,$from])
                    ->inRandomOrder()->paginate(10);
               
                    return view('user.match.matches', [
                        'matches' => $user_search,
                    ]);
             }
             else{
                $user_search = User::where([
                    ['gender', '=', "$gender"],
                    ['orientation', '=', "$orientation"],
                    ['id', '!=', Auth::id()],
                    ['email_verified_at', '!=', null],
                ])->inRandomOrder()->paginate(10);
                    
                return view('user.match.matches', [
                    'matches' => $user_search,
                ]);

             }
         }
    }

    public function delete(Matches $match)
    {
        $match->delete();
        return redirect(route('admin.dashboard'))->with('error', 'Match deleted');
    }
}
