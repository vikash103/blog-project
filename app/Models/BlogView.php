<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'blog_id',
    ];

    /**
     * View kis user ka hai
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * View kis blog ka hai
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}