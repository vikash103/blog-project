<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Blog $blog)
    {
        $like = Like::where('user_id', Auth::id())
            ->where('blog_id', $blog->id)
            ->first();

        if ($like) {
            $like->delete();

            return back()->with('success', 'Like removed.');
        }

        Like::create([
            'user_id' => Auth::id(),
            'blog_id' => $blog->id,
        ]);

        return back()->with('success', 'Blog liked.');
    }
}