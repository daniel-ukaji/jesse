<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referrals extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_name',
        'ref_gender',
        'ref_email',
        'ref_no',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
