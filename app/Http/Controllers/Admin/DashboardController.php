<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Tag;

class DashboardController extends Controller
{
    // =================================================
    // MAIN DASHBOARD
    // =================================================

    public function index()
    {
        return view(
            'admin.dashboard',
            $this->dashboardData()
        );
    }


    // =================================================
    // AJAX DASHBOARD
    // =================================================

    public function dashboardPartial()
    {
        return view(
            'admin.partials.dashboard',
            $this->dashboardData()
        );
    }


    // =================================================
    // AJAX MANAGE BLOGS
    // =================================================

    public function blogsPartial()
    {
        $blogs = Blog::with([
                'category',
                'tags',
                'admin'
            ])
            ->latest()
            ->paginate(10);

        return view(
            'admin.partials.blogs',
            compact('blogs')
        );
    }


    // =================================================
    // AJAX CREATE BLOG
    // =================================================

    public function createBlogPartial()
    {
        $categories = Category::orderBy('name')
            ->get();

        $tags = Tag::orderBy('name')
            ->get();

        return view(
            'admin.partials.create-blog',
            compact(
                'categories',
                'tags'
            )
        );
    }


    // =================================================
    // AJAX COMMENTS
    // =================================================

    public function commentsPartial()
    {
        $comments = Comment::with([
                'user',
                'blog'
            ])
            ->latest()
            ->paginate(10);

        return view(
            'admin.partials.comments',
            compact('comments')
        );
    }


    // =================================================
    // AJAX ANALYTICS
    // =================================================

    public function analyticsPartial()
    {
        $totalBlogs = Blog::count();

        $totalViews = Blog::sum('views');

        $totalLikes = Like::count();

        $totalComments = Comment::count();

        $mostViewedBlogs = Blog::orderByDesc('views')
            ->take(5)
            ->get();

        $recentBlogs = Blog::latest()
            ->take(5)
            ->get();

        return view(
            'admin.partials.analytics',
            compact(
                'totalBlogs',
                'totalViews',
                'totalLikes',
                'totalComments',
                'mostViewedBlogs',
                'recentBlogs'
            )
        );
    }


    // =================================================
    // COMMON DASHBOARD DATA
    // =================================================

    private function dashboardData(): array
    {
        return [
            'totalBlogs' => Blog::count(),

            'totalViews' => Blog::sum('views'),

            'totalLikes' => Like::count(),

            'totalComments' => Comment::count(),

            'recentBlogs' => Blog::latest()
                ->take(6)
                ->get(),
        ];
    }
}