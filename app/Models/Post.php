<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters){
        $query->when(!empty($filters['keyword']), function($query) use ($filters){
            $query
                ->where('title', 'like', '%'.$filters['keyword'].'%')
                ->orWhere('body', 'like', '%'.$filters['keyword'].'%');
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
