<div>
    <div style="margin-bottom:25px;">
        <h1 style="margin:0 0 8px; font-size:28px; color:#111827;">
            Dashboard
        </h1>

        <p style="margin:0; color:#6b7280;">
            Manage your blog platform from one place.
        </p>
    </div>

    {{-- Statistics --}}
    <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit, minmax(180px, 1fr));
        gap:16px;
        margin-bottom:30px;
    ">

        <div style="
            background:white;
            border:1px solid #e5e7eb;
            border-radius:12px;
            padding:20px;
        ">
            <p style="margin:0 0 10px; color:#6b7280;">
                Total Blogs
            </p>

            <h2 style="margin:0;">
                {{ $totalBlogs }}
            </h2>
        </div>

        <div style="
            background:white;
            border:1px solid #e5e7eb;
            border-radius:12px;
            padding:20px;
        ">
            <p style="margin:0 0 10px; color:#6b7280;">
                Total Views
            </p>

            <h2 style="margin:0;">
                {{ number_format($totalViews) }}
            </h2>
        </div>

        <div style="
            background:white;
            border:1px solid #e5e7eb;
            border-radius:12px;
            padding:20px;
        ">
            <p style="margin:0 0 10px; color:#6b7280;">
                Total Likes
            </p>

            <h2 style="margin:0;">
                {{ $totalLikes }}
            </h2>
        </div>

        <div style="
            background:white;
            border:1px solid #e5e7eb;
            border-radius:12px;
            padding:20px;
        ">
            <p style="margin:0 0 10px; color:#6b7280;">
                Total Comments
            </p>

            <h2 style="margin:0;">
                {{ $totalComments }}
            </h2>
        </div>

    </div>

    {{-- Recent Blogs --}}
    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:15px;
    ">
        <h2 style="margin:0; font-size:20px;">
            Recent Blogs
        </h2>
    </div>

    <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit, minmax(240px, 1fr));
        gap:16px;
    ">

        @forelse($recentBlogs as $blog)

            <div style="
                background:white;
                border:1px solid #e5e7eb;
                border-radius:12px;
                overflow:hidden;
            ">

                @if($blog->thumbnail)

                    <img
                        src="{{ asset('storage/' . $blog->thumbnail) }}"
                        alt="{{ $blog->title }}"
                        style="
                            width:100%;
                            height:150px;
                            object-fit:cover;
                        "
                    >

                @else

                    <div style="
                        height:150px;
                        background:#e5e7eb;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:#6b7280;
                    ">
                        No Image
                    </div>

                @endif

                <div style="padding:15px;">

                    <h3 style="
                        margin:0 0 8px;
                        font-size:15px;
                    ">
                        {{ $blog->title }}
                    </h3>

                    <small style="color:#6b7280;">
                        {{ $blog->created_at->format('d M Y') }}
                        ·
                        {{ $blog->views ?? 0 }} views
                    </small>

                </div>

            </div>

        @empty

            <p>No blogs found.</p>

        @endforelse

    </div>
</div>