<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'tag', 'article', 'image', 'readers'];
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('tag', 'like', '%' . request('search') . '%');
        }

        if ($filters['tag'] ?? false) {
            $query->where('tag', 'like', '%' . request('tag') . '%');
        }
    }

    public function tags()
    {
        return $this->belongsTo(Tag::class);
    }

}
