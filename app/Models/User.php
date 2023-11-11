<?php

namespace App\Models;

use App\Events\UserCreated;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\State;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['orientation'] ?? false) {
            $query->where('orientation', 'like', '%' . request('orientation') . '%');
        }
        if ($filters['gender'] ?? false) {
            $query->where('gender', 'like', '%' . request('gender') . '%');
        }
        if ($filters['country'] ?? false) {
            $query->where('country', 'like', '%' . request('country') . '%');
        }
        if ($filters['search'] ?? false) {
            $query->where('first_name', 'like', '%' . request('search') . '%')
                ->orWhere('last_name', 'like', '%' . request('search') . '%')
                ->orWhere('gender', 'like', '%' . request('search') . '%')
                ->orWhere('country', 'like', '%' . request('search') . '%');
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',

        // form 1
        'date_of_birth',
        'gender',
        'orientation',
        'relationship_status',
        'looking_for',
        'children',

        // form 2
        'height',
        'weight',
        'body_type',
        'hair_color',
        'eye_color',
        'ethnicity',
        'religion',
        'zodiac_sign',

        // form 3
        'first_language',
        'second_language',
        'employed',
        'profession',
        'activity_level',
        'education',
        'extra',

        // form 4
        'pets',
        'smokes',
        'drinks',
        'drugs',
        'profile_pic',
        'dp_1',
        'dp_2',
        'how_jelly',
        'country',
        'state',
        'city',

        // filled later
        'subscription',
    ];

    protected $dispatchesEvents = [
        'created' => UserCreated::class,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function seeks()
    {
        return $this->hasOne(Seeks::class,'user_id','id');
    }

    public function referrals()
    {
        return $this->hasMany(Referrals::class);
    }

    public function matches()
    {
        return $this->hasMany(Matches::class);
    }

    public function matchedUser()
    {
        return $this->hasMany(User::class, 'matchedUser_id');
    }
    public function states(){
        return $this->hasOne(State::class,'StateID','state');
    }
}
