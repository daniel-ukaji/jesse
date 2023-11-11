<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function create()
    {
        return view('admin.mailing.create');
    }

    public function sendMail(Request $request)
    {
        $data = $request->validate([
            'send_to' => 'required',
            'title' => 'required|max:100',
            'content' => 'required'
        ]);

        $content = nl2br($data['content']);

        $users = match ($data['send_to']) {
            "verified" => User::where('email_verified_at', '!=', null)->get(),
            "unverified" => User::where('email_verified_at', null)->get(),
            "all" => User::all(),
            default =>  User::all()
        };


        try {
            foreach ($users as $user) {
                $user_name = $user->first_name;
                Mail::to($user->email)->queue(new NewsLetter($data['title'], $user_name, $content));
            }
            return back()->with('status', 'Emails have been queued for sending');
        } catch (\Exception $e) {
            return back()->with('error', "something went wrong \n $e");
        }

        /* FOR TESTING */

        // try {
        //     Mail::to("udwaghie@gmail.com")->queue(new NewsLetter($data['title'], $data['content']));
        //     return back()->with('status', 'Emails have been queued for sending');
        // } catch (\Throwable $th) {
        //     return back()->with('error', "something went wrong \n $th");
        // }
    }
}
