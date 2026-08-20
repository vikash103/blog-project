<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $blog->seo_title ?: $blog->title }}</title>

    @if($blog->seo_description)
        <meta name="description" content="{{ $blog->seo_description }}">
    @endif

    @if($blog->canonical_tag)
        <link rel="canonical" href="{{ $blog->canonical_tag }}">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            color: #111827;
        }

        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 22px;
            font-weight: 700;
            color: #111827;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: #4b5563;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }

        .container {
            width: 92%;
            max-width: 1050px;
            margin: 35px auto 70px;
        }

        .breadcrumb {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 25px;
        }

        .breadcrumb a {
            color: #2563eb;
            text-decoration: none;
        }

        .article {
            background: white;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0,0,0,0.05);
        }

        .banner {
            width: 100%;
            max-height: 430px;
            object-fit: cover;
            display: block;
        }

        .article-body {
            padding: 35px;
        }

        .category {
            display: inline-block;
            background: #eff6ff;
            color: #2563eb;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .title {
            margin: 0;
            font-size: 38px;
            line-height: 1.25;
        }

        .meta {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            color: #6b7280;
            font-size: 13px;
            margin-top: 18px;
            margin-bottom: 25px;
        }

        .description {
            font-size: 17px;
            line-height: 1.7;
            color: #4b5563;
            margin-bottom: 30px;
        }

        .content {
            font-size: 16px;
            line-height: 1.8;
        }

        .content h2 {
            margin-top: 35px;
            font-size: 27px;
        }

        .content h3 {
            margin-top: 28px;
            font-size: 22px;
        }

        .content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .tags {
            margin-top: 35px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .tag {
            display: inline-block;
            background: #f3f4f6;
            padding: 7px 11px;
            margin: 5px 5px 0 0;
            border-radius: 20px;
            font-size: 13px;
        }

        .section {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 28px;
            margin-top: 25px;
        }

        .section h2 {
            margin-top: 0;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .related-card {
            border: 1px solid #e5e7eb;
            border-radius: 9px;
            overflow: hidden;
            background: white;
        }

        .related-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }

        .related-card-body {
            padding: 15px;
        }

        .related-card a {
            color: #111827;
            text-decoration: none;
            font-weight: 700;
        }

        .footer {
            margin-top: 50px;
            background: #111827;
            color: #d1d5db;
            text-align: center;
            padding: 24px;
            font-size: 13px;
        }

        @@media (max-width: 800px) {
            .related-grid {
                grid-template-columns: 1fr;
            }

            .article-body {
                padding: 22px;
            }

            .title {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">

        <a href="{{ route('blogs.index') }}" class="logo">
            BlogSpace
        </a>

        <div class="nav-links">

            <a href="{{ route('blogs.index') }}">
                Blogs
            </a>

            

        </div>

    </nav>


    <main class="container">

        <!-- BREADCRUMB -->

        <div class="breadcrumb">

            <a href="{{ route('blogs.index') }}">
                Blogs
            </a>

            /

            {{ $blog->category?->name ?? 'Blog' }}

            /

            {{ $blog->title }}

        </div>


        <!-- MAIN ARTICLE -->

        <article class="article">

            @if($blog->banner)

                <img
                    src="{{ asset('storage/' . $blog->banner) }}"
                    alt="{{ $blog->title }}"
                    class="banner"
                >

            @endif


            <div class="article-body">

                @if($blog->category)

                    <span class="category">
                        {{ $blog->category->name }}
                    </span>

                @endif


                <h1 class="title">
                    {{ $blog->title }}
                </h1>


                <div class="meta">

                    <span>
                        By {{ $blog->admin?->name ?? 'Admin' }}
                    </span>

                    <span>
                        {{ $blog->created_at->format('d M Y') }}
                    </span>

                    <span>
                        👁 {{ $blog->views }}
                    </span>

                    <span>
                        ♥ {{ $blog->likes_count }}
                    </span>

                    <span>
                        💬 {{ $blog->comments_count }}
                    </span>

                </div>


                @if($blog->description)

                    <div class="description">
                        {{ $blog->description }}
                    </div>

                @endif


                <!-- FULL CONTENT -->

                <div class="content">
                    {!! $blog->content !!}
                </div>


                <!-- TAGS -->

                <div class="tags">

                    <strong>Tags:</strong>

                    @forelse($blog->tags as $tag)

                        <span class="tag">
                            {{ $tag->name }}
                        </span>

                    @empty

                        <span>No tags</span>

                    @endforelse

                </div>

            </div>

        </article>


       <!-- LIKE SECTION -->

<section class="section">

    <h2>Like this article</h2>

    @auth

        @php
            $userLiked = $blog->likes
                ->contains('user_id', auth()->id());
        @endphp

        <form
            method="POST"
            action="{{ route('blogs.like', $blog->id) }}"
        >
            @csrf

            <button
                type="submit"
                style="
                    background: {{ $userLiked ? '#dc2626' : '#2563eb' }};
                    color: white;
                    border: none;
                    padding: 11px 20px;
                    border-radius: 7px;
                    cursor: pointer;
                    font-size: 14px;
                    font-weight: 600;
                "
            >
                @if($userLiked)
                    ♥ Unlike
                @else
                    ♡ Like
                @endif
            </button>

            <span
                style="
                    margin-left: 12px;
                    color: #6b7280;
                    font-size: 14px;
                    font-weight: 600;
                "
            >
                {{ $blog->likes_count }}
                {{ $blog->likes_count == 1 ? 'Like' : 'Likes' }}
            </span>

        </form>

    @else

        <div
            style="
                background:#f9fafb;
                border:1px solid #e5e7eb;
                padding:16px;
                border-radius:8px;
            "
        >
            <p style="margin:0;">
                <a
                    href="{{ route('google.login') }}"
                    style="
                        color:#2563eb;
                        font-weight:600;
                        text-decoration:none;
                    "
                >
                    Login with Google
                </a>

                to like this article.
            </p>
        </div>

    @endauth

</section>

        <!-- COMMENTS -->

       <section class="section">

    <h2>
        Comments ({{ $blog->comments_count }})
    </h2>

    @if(session('success'))
        <div style="
            background:#dcfce7;
            color:#166534;
            padding:12px 15px;
            border-radius:6px;
            margin-bottom:15px;
        ">
            {{ session('success') }}
        </div>
    @endif


    @error('body')
        <div style="
            background:#fee2e2;
            color:#991b1b;
            padding:12px 15px;
            border-radius:6px;
            margin-bottom:15px;
        ">
            {{ $message }}
        </div>
    @enderror


    @auth

        <form
            action="{{ route('blogs.comments.store', $blog->id) }}"
            method="POST"
            style="margin-bottom:30px;"
        >

            @csrf

            <textarea
                name="body"
                rows="4"
                placeholder="Write your comment..."
                required
                style="
                    width:100%;
                    padding:12px;
                    border:1px solid #d1d5db;
                    border-radius:7px;
                    resize:vertical;
                    box-sizing:border-box;
                    font-family:Arial,sans-serif;
                    font-size:14px;
                "
            >{{ old('body') }}</textarea>

            <button
                type="submit"
                style="
                    margin-top:10px;
                    background:#2563eb;
                    color:white;
                    border:none;
                    padding:10px 18px;
                    border-radius:6px;
                    cursor:pointer;
                    font-weight:600;
                "
            >
                Post Comment
            </button>

        </form>

    @else

        <div style="
            background:#f9fafb;
            padding:15px;
            border:1px solid #e5e7eb;
            border-radius:7px;
            margin-bottom:25px;
        ">

            <a
                href="{{ route('google.login') }}"
                style="
                    color:#2563eb;
                    font-weight:600;
                    text-decoration:none;
                "
            >
                Login with Google
            </a>

            to post a comment.

        </div>

    @endauth


    @forelse($blog->comments as $comment)

        <div style="
            padding:15px 0;
            border-bottom:1px solid #e5e7eb;
        ">

            <div style="
                display:flex;
                justify-content:space-between;
                align-items:center;
            ">

                <strong>
                    {{ $comment->user?->name ?? 'User' }}
                </strong>

                <span style="
                    font-size:12px;
                    color:#6b7280;
                ">
                    {{ $comment->created_at->format('d M Y, h:i A') }}
                </span>

            </div>


            <div style="
                margin-top:10px;
                line-height:1.6;
            ">
                {{ $comment->body }}
            </div>


            @auth

                @if(auth()->id() === $comment->user_id)

                    <form
                        action="{{ route('comments.destroy', $comment->id) }}"
                        method="POST"
                        style="margin-top:10px;"
                        onsubmit="return confirm('Are you sure you want to delete this comment?');"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            style="
                                background:none;
                                border:none;
                                color:#dc2626;
                                cursor:pointer;
                                padding:0;
                                font-size:13px;
                                font-weight:600;
                            "
                        >
                            Delete
                        </button>

                    </form>

                @endif

            @endauth

        </div>

    @empty

        <p style="color:#6b7280;">
            No comments yet. Be the first to comment.
        </p>

    @endforelse

</section>

        <!-- RELATED BLOGS -->

        @if($relatedBlogs->count())

            <section class="section">

                <h2>Related Articles</h2>


                <div class="related-grid">

                    @foreach($relatedBlogs as $related)

                        <div class="related-card">

                            @if($related->thumbnail)

                                <img
                                    src="{{ asset('storage/' . $related->thumbnail) }}"
                                    alt="{{ $related->title }}"
                                >

                            @endif


                            <div class="related-card-body">

                                <a href="{{ route('blogs.show', $related->slug) }}">
                                    {{ $related->title }}
                                </a>

                                <p style="
                                    color:#6b7280;
                                    font-size:13px;
                                    line-height:1.5;
                                ">
                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags($related->description),
                                        80
                                    ) }}
                                </p>

                            </div>

                        </div>

                    @endforeach

                </div>

            </section>

        @endif

    </main>


    <footer class="footer">
        © {{ date('Y') }} BlogSpace. All rights reserved.
    </footer>

</body>
</html>