<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }}</title>

    <style>
        body{
            margin:0;
            font-family:Arial,sans-serif;
            background:#f3f4f6;
            color:#111827;
        }

        .topbar{
            background:#111827;
            color:white;
            padding:16px 30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .topbar a{
            color:white;
            text-decoration:none;
        }

        .container{
            width:94%;
            max-width:1000px;
            margin:30px auto;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 2px 10px rgba(0,0,0,.06);
        }

        .banner{
            width:100%;
            max-height:350px;
            object-fit:cover;
            border-radius:8px;
            margin-bottom:25px;
        }

        .thumbnail{
            width:140px;
            height:90px;
            object-fit:cover;
            border-radius:8px;
        }

        .meta{
            color:#6b7280;
            margin-bottom:20px;
        }

        .content{
            margin-top:25px;
            line-height:1.7;
        }

        .tags{
            margin-top:25px;
        }

        .tag{
            display:inline-block;
            background:#e5e7eb;
            padding:6px 10px;
            border-radius:20px;
            margin-right:6px;
            font-size:13px;
        }

        .actions{
            margin-top:30px;
            display:flex;
            gap:10px;
        }

        .edit{
            background:#16a34a;
            color:white;
            text-decoration:none;
            padding:10px 16px;
            border-radius:6px;
        }

        .back{
            background:#2563eb;
            color:white;
            text-decoration:none;
            padding:10px 16px;
            border-radius:6px;
        }
    </style>
</head>

<body>

<div class="topbar">
    <h2>View Blog</h2>

    <a href="{{ route('admin.blogs.index') }}">
        ← Back to Blogs
    </a>
</div>

<div class="container">

    <div class="card">

        @if($blog->banner)
            <img
                src="{{ asset('storage/' . $blog->banner) }}"
                alt="{{ $blog->title }}"
                class="banner"
            >
        @endif

        <h1>{{ $blog->title }}</h1>

        <div class="meta">
            Category:
            {{ $blog->category?->name ?? 'N/A' }}

            |
            Views: {{ $blog->views }}

            |
            Author:
            {{ $blog->admin?->name ?? 'Admin' }}
        </div>

        @if($blog->thumbnail)
            <div style="margin-bottom:20px;">
                <img
                    src="{{ asset('storage/' . $blog->thumbnail) }}"
                    alt="{{ $blog->title }}"
                    class="thumbnail"
                >
            </div>
        @endif

        <h3>Description</h3>

        <p>
            {{ $blog->description }}
        </p>

        <h3>Content</h3>

        <div class="content">
            {!! $blog->content !!}
        </div>

        <div class="tags">

            <strong>Tags:</strong>

            @forelse($blog->tags as $tag)

                <span class="tag">
                    {{ $tag->name }}
                </span>

            @empty

                No tags

            @endforelse

        </div>


        <hr style="margin:30px 0;">


        <h3>SEO Information</h3>

        <p>
            <strong>SEO Title:</strong>
            {{ $blog->seo_title ?? 'N/A' }}
        </p>

        <p>
            <strong>SEO Description:</strong>
            {{ $blog->seo_description ?? 'N/A' }}
        </p>

        <p>
            <strong>Canonical URL:</strong>
            {{ $blog->canonical_tag ?? 'N/A' }}
        </p>


        <div class="actions">

            <a
                href="{{ route('admin.blogs.index') }}"
                class="back"
            >
                Back
            </a>

            <a
                href="{{ route('admin.blogs.edit', $blog) }}"
                class="edit"
            >
                Edit Blog
            </a>

        </div>

    </div>

</div>

</body>
</html>