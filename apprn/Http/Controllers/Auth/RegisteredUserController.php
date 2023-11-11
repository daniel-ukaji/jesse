<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Exception;

class RegisteredUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
    }

    public function adminRegisterForm()
    {
        return view('admin.auth.register', [
            'url' => 'Admin'
        ]);
    }

    public function createAdmin(Request $request)
    {
        $credentials = $request->validate([
            'first_name' => ['required', 'min:2', 'max:20'],
            'last_name' => ['required', 'min:2', 'max:20'],
            'email' => ['required', 'email', Rule::unique('admins', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);
        $credentials['password'] = bcrypt($credentials['password']);

        try {
            $admin = Admin::create($credentials);
            Auth::login($admin);
            return redirect(route('admin.dashboard'))->with('status', 'You\'re now logged in as Administrator');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong');
        }
    }

    // show register form
    public function create()
    {
        return view('user.auth.signup');
    }

    // Register New User
    public function store(Request $request)
    {
        $validate = $request->validate([
            'first_name' => ['required', 'min:2', 'max:20'],
            'last_name' => ['required', 'min:2', 'max:20'],
            'phone_number' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $validate['password'] = bcrypt($validate['password']);

        try {
            $user = User::create($validate);

            event(new Registered($user));

            Auth::login($user);
            return redirect()->intended('/')->with('status', 'Account created!');
        } catch (Exception $e) {

            if (isset($user)) {
                $user->delete();
            }

            return redirect()->back()->with('error', "Something went wrong while processing your request");
        }

        // For Testing
        // $user = User::create($validate);
        // dd($user);
        // event(new Registered($user));
        // Auth::login($user);
        // return redirect()->intended('/')->with('status', 'Account created!');
    }
}
