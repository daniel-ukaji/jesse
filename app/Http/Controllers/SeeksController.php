<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seeks;
use App\Models\State;
use Illuminate\Http\Request;

class SeeksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usas=State::whereBetween('StateID',[0,51])->get();
        $canadas=State::whereBetween("StateID",[53,67])->get();
        $user = auth()->user();
        $seeks = $user->seeks;
        $states=State::all();
        return view('user.seeks.index', compact('seeks','usas','canadas','states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $user_gender = auth()->user()->gender;
        $user_orientation = auth()->user()->orientation;

        if ($user_orientation == "Heterosexual" && $user_gender == "Male") {
            $option = "Female";
        } elseif ($user_orientation == "Heterosexual" && $user_gender == "Female") {
            $option = "Male";
        } elseif ($user_orientation == "Lesbian" && $user_gender == "Female") {
            $option = "Female";
        } elseif ($user_orientation == "Gay" && $user_gender == "Male") {
            $option = "Male";
        } elseif ($user_orientation == "Bisexual" && $user_gender == "Male") {
            $option = "Male or Female";
        } elseif ($user_orientation == "Bisexual" && $user_gender == "Female") {
            $option = "Male or Female";
        } else {
            $option = "Choose an Option";
        }

        $usas=State::whereBetween('StateID',[0,51])->get();
        $canadas=State::whereBetween("StateID",[51,67])->orderBy('StateID','Desc')->get();
        return view('user.seeks.create')->with([
            'user' => $user,
            'option' => $option,
            'usas'=>$usas,
            'canadas'=>$canadas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'gender' => 'sometimes|nullable',
            'sexual_orientation' => 'sometimes|nullable',
            'height' => 'sometimes|nullable',
            'body_type' => 'sometimes|nullable',
            'hair_color' => 'sometimes|nullable',
            'eye_color' => 'sometimes|nullable',
            'how_pa' => 'sometimes|nullable',
            'education' => 'sometimes|nullable',

            'rel_type' => 'sometimes|nullable',
            'how_jelly' => 'sometimes|nullable',
            'ethnicity' => 'sometimes|nullable',
            'religion' => 'sometimes|nullable',
            'zodiac_sign' => 'sometimes|nullable',

            'children' => 'sometimes|nullable',
            'date_pet_owner' => 'sometimes|nullable',
            'date_drug' => 'sometimes|nullable',
            'date_drink' => 'sometimes|nullable',
            'date_smoker' => 'sometimes|nullable',
            'country' => 'sometimes|nullable',
            'state'=>'sometimes|nullable',
            'age' => 'sometimes|nullable'
        ]);
        
        $religion="";
       if($request->religion ==null){
        $validate['religion']="N/A";
       }
       else{
         foreach($request->religion as $key=>$rel){
            $religion=$rel.','.$religion;
        }
        $validate['religion']=rtrim($religion,',');
       }
       
        
        $request->user()->seeks()->create($validate);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seeks  $seek
     * @return \Illuminate\Http\Response
     */
    public function show(Seeks $seek)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seeks  $seek
     * @return \Illuminate\Http\Response
     */
    public function edit(Seeks $seek)
    {
        $usas=State::whereBetween('StateID',[0,51])->orWhere('StateID','999')->get();
        $canadas=State::whereBetween("StateID",[52,67])->orderBy('StateID','Desc')->get();
        $seeks = auth()->user()->seeks;
        return view('user.seeks.edit', compact('seeks','usas','canadas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seeks  $seek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seeks $seek)
    {
        $validate = $request->validate([
            'gender' => 'sometimes|nullable',
            'sexual_orientation' => 'sometimes|nullable',
            'height' => 'sometimes|nullable',
            'body_type' => 'sometimes|nullable',
            'hair_color' => 'sometimes|nullable',
            'eye_color' => 'sometimes|nullable',
            'how_pa' => 'sometimes|nullable',
            'education' => 'sometimes|nullable',

            'rel_type' => 'sometimes|nullable',
            'how_jelly' => 'sometimes|nullable',
            'ethnicity' => 'sometimes|nullable',
            'religion' => 'sometimes|nullable',
            'zodiac_sign' => 'sometimes|nullable',

            'children' => 'sometimes|nullable',
            'date_pet_owner' => 'sometimes|nullable',
            'date_drug' => 'sometimes|nullable',
            'date_drink' => 'sometimes|nullable',
            'date_smoker' => 'sometimes|nullable',
            'country' => 'sometimes|nullable',
            'state' => 'sometimes|nullable',
            'age' => 'sometimes|nullable'

        ]);
        // dd($request->all());
        $religion="";

        if($request->religion ==null){
            $validate['religion']="N/A";
           }
           else{
             foreach($request->religion as $key=>$rel){
                $religion=$rel.','.$religion;
            }
            $validate['religion']=rtrim($religion,',');
           }
       
        $seek->update($validate);

        return redirect(route('dashboard'))->with('status', 'Preferences Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seeks  $seek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seeks $seek)
    {
        $seek->delete();
        return redirect(route('dashboard'))->with('error', 'Preference Deleted, Create new preference');
    }
}
