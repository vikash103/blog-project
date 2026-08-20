<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blogs</title>

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
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 22px;
            font-weight: 700;
            color: #111827;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .nav-links a {
            color: #4b5563;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a:hover {
            color: #2563eb;
        }

        .google-login-btn {
            background: #2563eb;
            color: white !important;
            padding: 9px 15px;
            border-radius: 6px;
            text-decoration: none;
        }

        .google-login-btn:hover {
            background: #1d4ed8;
            color: white !important;
        }

        .user-name {
            color: #4b5563;
            font-size: 14px;
            font-weight: 600;
        }

        .logout-btn {
            background: #dc2626;
            color: white;
            border: none;
            padding: 9px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .logout-btn:hover {
            background: #b91c1c;
        }

        .hero {
            background: #111827;
            color: white;
            padding: 65px 20px;
            text-align: center;
        }

        .hero h1 {
            margin: 0 0 14px;
            font-size: 38px;
        }

        .hero p {
            margin: 0 auto;
            max-width: 650px;
            color: #d1d5db;
            font-size: 16px;
            line-height: 1.6;
        }

        .container {
            width: 92%;
            max-width: 1200px;
            margin: 45px auto 70px;
        }

        .section-header {
            margin-bottom: 28px;
        }

        .section-header h2 {
            margin: 0 0 7px;
            font-size: 26px;
        }

        .section-header p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .blog-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(0,0,0,0.05);
            transition: 0.25s;
            display: flex;
            flex-direction: column;
        }

        .blog-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.10);
        }

        .image-wrapper {
            width: 100%;
            height: 210px;
            background: #e5e7eb;
            overflow: hidden;
        }

        .image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.3s;
        }

        .blog-card:hover .image-wrapper img {
            transform: scale(1.03);
        }

        .no-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 14px;
            background: #e5e7eb;
        }

        .blog-content {
            padding: 22px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .category {
            display: inline-block;
            width: fit-content;
            background: #eff6ff;
            color: #2563eb;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .blog-title {
            margin: 0 0 10px;
            font-size: 20px;
            line-height: 1.35;
        }

        .blog-title a {
            color: #111827;
            text-decoration: none;
        }

        .blog-title a:hover {
            color: #2563eb;
        }

        .description {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 18px;
        }

        .author {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #6b7280;
            font-size: 12px;
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }

        .stats {
            display: flex;
            gap: 14px;
            margin-top: 16px;
            color: #6b7280;
            font-size: 13px;
        }

        .read-more {
            display: inline-block;
            margin-top: 18px;
            color: #2563eb;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .read-more:hover {
            text-decoration: underline;
        }

        .empty {
            grid-column: 1 / -1;
            background: white;
            padding: 60px 20px;
            text-align: center;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        .empty h3 {
            margin: 0 0 8px;
        }

        .empty p {
            color: #6b7280;
            margin: 0;
        }

        .pagination-wrapper {
            margin-top: 35px;
        }

        .footer {
            background: #111827;
            color: #d1d5db;
            text-align: center;
            padding: 25px 20px;
            font-size: 13px;
        }

        @@media (max-width: 950px) {
            .blog-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @@media (max-width: 650px) {
            .navbar {
                padding: 15px 20px;
            }

            .blog-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 45px 20px;
            }

            .hero h1 {
                font-size: 30px;
            }

            .nav-links {
                gap: 10px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->

   <nav class="navbar">

    {{-- Logo -> Home Page --}}
    <a href="{{ url('/') }}" class="logo">
        BlogSpace
    </a>

    <div class="nav-links">

        {{-- Home --}}
        <a href="{{ url('/') }}">
            Home
        </a>

        {{-- Blogs --}}
        <a href="{{ route('blogs.index') }}">
            Blogs
        </a>

        @auth

            <span class="user-name">
                Hi, {{ auth()->user()->name }}
            </span>

            <form
                method="POST"
                action="{{ route('logout') }}"
                style="margin:0;"
            >
                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >
                    Logout
                </button>
            </form>

        @else

            <a
                href="{{ route('google.login') }}"
                class="google-login-btn"
            >
                Login with Google
            </a>

        @endauth

    </div>

</nav>


    <!-- HERO -->

    <section class="hero">

        <h1>Discover Stories & Ideas</h1>

        <p>
            Explore articles, insights and useful content from our
            growing community.
        </p>

    </section>


    <!-- BLOGS -->

    <main class="container">

        <div class="section-header">

            <h2>Latest Articles</h2>

            <p>
                Explore our latest published articles.
            </p>

        </div>


        <div class="blog-grid">

            @forelse($blogs as $blog)

                <article class="blog-card">

                    <!-- THUMBNAIL -->

                    <a href="{{ route('blogs.show', $blog->slug) }}">

                        <div class="image-wrapper">

                            @if($blog->thumbnail)

                                <img
                                    src="{{ asset('storage/' . $blog->thumbnail) }}"
                                    alt="{{ $blog->title }}"
                                >

                            @else

                                <div class="no-image">
                                    No Image Available
                                </div>

                            @endif

                        </div>

                    </a>


                    <div class="blog-content">

                        <!-- CATEGORY -->

                        @if($blog->category)

                            <span class="category">
                                {{ $blog->category->name }}
                            </span>

                        @endif


                        <!-- TITLE -->

                        <h2 class="blog-title">

                            <a href="{{ route('blogs.show', $blog->slug) }}">
                                {{ $blog->title }}
                            </a>

                        </h2>


                        <!-- DESCRIPTION -->

                        <div class="description">

                            {{ \Illuminate\Support\Str::limit(
                                strip_tags($blog->description),
                                130
                            ) }}

                        </div>


                        <!-- AUTHOR / DATE -->

                        <div class="author">

                            <span>
                                By {{ $blog->admin?->name ?? 'Admin' }}
                            </span>

                            <span>
                                {{ $blog->created_at->format('d M Y') }}
                            </span>

                        </div>


                        <!-- COUNTS -->

                        <div class="stats">

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


                        <!-- READ MORE -->

                        <a
                            href="{{ route('blogs.show', $blog->slug) }}"
                            class="read-more"
                        >
                            Read Article →
                        </a>

                    </div>

                </article>

            @empty

                <div class="empty">

                    <h3>No blogs available yet</h3>

                    <p>
                        New articles will appear here once they are published.
                    </p>

                </div>

            @endforelse

        </div>


        <!-- PAGINATION -->

        @if($blogs->hasPages())

            <div class="pagination-wrapper">
                {{ $blogs->links() }}
            </div>

        @endif

    </main>


    <!-- FOOTER -->

    <footer class="footer">
        © {{ date('Y') }} BlogSpace. All rights reserved.
    </footer>

</body>
</html>