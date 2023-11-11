<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Referrals;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReferralsController extends Controller
{
    public function index()
    {
        return view('admin.referrals.index', [
            'refs' => Referrals::with('user')->latest()->paginate(10),
            'matches' => Matches::with(['user', 'matched_user'])->latest()->get()
        ]);
    }

    public function create()
    {
        return view('user.referrals.index');
    }

    public function store(Request $request)
    {
        try {
            $credentials = $request->validate([
                'ref_name' => ['required', 'min:5'],
                'ref_gender' => 'required',
                'referral_email' => ['sometimes', 'nullable',  Rule::unique('referrals', 'ref_email')],
                'ref_no' => 'required',
            ]);

            $request->user()->referrals()->create([
                'ref_name' => $credentials['ref_name'],
                'ref_gender' => $credentials['ref_gender'],
                'ref_email' => $credentials['referral_email'],
                'ref_no' => $credentials['ref_no']
            ]);
            return back()->with('status', 'Referral has been submitted');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function delete(Referrals $ref)
    {
        $ref->delete();
        return redirect(route('user.refs'))->with('error', 'Referral deleted');
    }
}
