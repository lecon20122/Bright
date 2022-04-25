<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');

    }

    public function scopeChild($query)
    {
        return $query->whereNotNull('parent_id');
    }
}
