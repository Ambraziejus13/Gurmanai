<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recording extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'host_name',
        'link',
        'recipe_id'
    ];

    // Relationship To Recipe
    public function recipe() {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
