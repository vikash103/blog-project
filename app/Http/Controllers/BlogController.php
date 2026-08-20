<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogView;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Public blog listing page
     */
    public function index()
    {
        $blogs = Blog::with(['category', 'admin'])
            ->withCount(['likes', 'comments'])
            ->latest()
            ->paginate(9);

        return view('blogs.index', compact('blogs'));
    }


    /**
     * Public single blog detail page
     */
    public function show(string $slug)
    {
        $blog = Blog::with([
                'category',
                'admin',
                'tags',
                'likes',
                'comments.user'
            ])
            ->withCount(['likes', 'comments'])
            ->where('slug', $slug)
            ->firstOrFail();


        // ==========================================
        // UNIQUE VIEW FOR LOGGED-IN USERS
        // ==========================================

        if (Auth::check()) {

            $view = BlogView::firstOrCreate([
                'user_id' => Auth::id(),
                'blog_id' => $blog->id,
            ]);

            // Sirf first time view hone par count increase hoga
            if ($view->wasRecentlyCreated) {
                $blog->increment('views');
                $blog->refresh();
            }

        } else {

            // ======================================
            // GUEST USER - SESSION BASED VIEW
            // ======================================

            $sessionKey = 'viewed_blog_' . $blog->id;

            if (!session()->has($sessionKey)) {

                $blog->increment('views');

                session()->put($sessionKey, true);

                $blog->refresh();
            }
        }


        // ==========================================
        // RELATED BLOGS
        // ==========================================

        $relatedBlogs = Blog::where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();


        return view(
            'blogs.show',
            compact('blog', 'relatedBlogs')
        );
    }
}