<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'name',
        'date_of_birth',
        'type'
        // type is not needed, default value will be asigned during creation and
        // fillable is not required during editing (in admin dashboard) unless seeding?
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
        'date_of_birth' => 'datetime', // maybe not neccessary?
    ];

    // SHOULD BE DELETED AFTER DB SETUP
    // Relationship With Listings
    // public function listings() {
    //     return $this->hasMany(Listing::class, 'user_id');
    // }

    // Relationship with Groups
    public function groups(){
        return $this->hasMany(Group::class, 'user_id');
    }

    // Relationship with Group members
    public function memberships(){
        return $this->hasMany(GroupMember::class, 'user_id');
    }

    // Relationship with Recipes
    public function recipes(){
        return $this->hasMany(Recipe::class, 'user_id');
    }
}
