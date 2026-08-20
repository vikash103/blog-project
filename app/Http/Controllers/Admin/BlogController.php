<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with(['category', 'tags', 'admin']);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->sort === 'oldest') {
            $query->oldest();
        } elseif ($request->sort === 'az') {
            $query->orderBy('title', 'asc');
        } else {
            $query->latest();
        }

        $perPage = in_array((int) $request->per_page, [10, 20, 30, 40, 50])
            ? (int) $request->per_page
            : 10;

        $blogs = $query->paginate($perPage)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('admin.blogs.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blogs,slug'],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'max:2048'],
            'banner' => ['nullable', 'image', 'max:4096'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
            'canonical_tag' => ['nullable', 'string', 'max:255'],
            'schema_markup' => ['nullable', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);

        if (Blog::where('slug', $slug)->exists()) {
            return back()
                ->withErrors(['slug' => 'This URL slug already exists.'])
                ->withInput();
        }

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')
                ->store('blogs/thumbnails', 'public');
        }

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')
                ->store('blogs/banners', 'public');
        }

        $validated['slug'] = $slug;
        $validated['admin_id'] = Auth::guard('admin')->id();
        $validated['views'] = 0;

        unset($validated['tags']);

        $blog = Blog::create($validated);

        $blog->tags()->sync($request->input('tags', []));

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    public function show(Blog $blog)
    {
        $blog->load(['category', 'tags', 'admin', 'comments', 'likes']);

        return view('admin.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        $blog->load('tags');

        return view('admin.blogs.edit', compact('blog', 'categories', 'tags'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blogs,slug,' . $blog->id],
            'description' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'max:2048'],
            'banner' => ['nullable', 'image', 'max:4096'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
            'canonical_tag' => ['nullable', 'string', 'max:255'],
            'schema_markup' => ['nullable', 'string'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['exists:tags,id'],
        ]);

        $slug = $validated['slug'] ?? Str::slug($validated['title']);

        $duplicateSlug = Blog::where('slug', $slug)
            ->where('id', '!=', $blog->id)
            ->exists();

        if ($duplicateSlug) {
            return back()
                ->withErrors(['slug' => 'This URL slug already exists.'])
                ->withInput();
        }

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')
                ->store('blogs/thumbnails', 'public');
        }

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')
                ->store('blogs/banners', 'public');
        }

        $validated['slug'] = $slug;

        unset($validated['tags']);

        $blog->update($validated);

        $blog->tags()->sync($request->input('tags', []));

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog deleted successfully.');
    }
}