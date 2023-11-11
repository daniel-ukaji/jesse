<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seeks extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'gender', 
        'sexual_orientation', 
        'age',
        'height',
        'body_type', 
        'hair_color', 
        'eye_color', 
        'how_pa',
        'education',

        'rel_type',
        'how_jelly',
        'ethnicity',
        'religion', 
        'zodiac_sign', 

        'children',
        'date_pet_owner', 
        'date_drug',
        'date_drink', 
        'date_smoker',
        'country',
        'state',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function states(){
        return $this->hasOne(State::class,'StateID','state');
    }
}
