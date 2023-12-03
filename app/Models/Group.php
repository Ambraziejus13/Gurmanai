<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
    ];

    // Relationship To Recipe
    public function recipes() {
        return $this->hasMany(Recipe::class, 'group_id');
    }

    // Relationship To Group members
    public function members() {
        return $this->hasMany(GroupMember::class, 'group_id');
    }

    // Relationship To User (editor)
    public function editor() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
