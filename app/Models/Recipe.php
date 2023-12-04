<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'number_of_servings',
        'preparation_time',
        'ingredients',
        'instructions',
        'user_id',
        'group_id'
    ];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('ingredients', 'like', '%' . $search . '%')
                    ->orWhere('instructions', 'like', '%' . $search . '%');
            });
        });
    
        $query->when($filters['group'] ?? false, function ($query, $group) {
            $query->whereHas('group', function ($query) use ($group) {
                $query->where('name', $group);
            });
        });
    
        $query->when($filters['host'] ?? false, function ($query, $host) {
            $query->whereHas('recordings', function ($query) use ($host) {
                $query->where('host_name', $host);
            });
        });
    }    

    public function scopeGroupByCategory($query, $group)
    {
        if ($group === 'group') {
            return $query->groupBy('group.name');
        } elseif ($group === 'host_name') {
            return $query;//->groupBy('host_name');
        }

        return $query;
    }

    // Relationship To User (author)
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship To Group
    public function group() {
        return $this->belongsTo(Group::class, 'group_id');
    }

    // Relationship To Recording
    public function recordings() {
        return $this->hasMany(Recording::class, 'recipe_id');
    }
}
