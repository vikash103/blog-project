<div>

    <div style="margin-bottom:25px;">

        <h1 style="margin:0 0 6px; font-size:28px;">
            Analytics
        </h1>

        <p style="margin:0; color:#6b7280;">
            Overview of your blog performance.
        </p>

    </div>


    {{-- Statistics --}}

    <div style="
        display:grid;
        grid-template-columns:repeat(auto-fit, minmax(180px,1fr));
        gap:16px;
        margin-bottom:30px;
    ">

        <div style="
            background:white;
            padding:20px;
            border:1px solid #e5e7eb;
            border-radius:12px;
        ">

            <p style="color:#6b7280; margin:0 0 10px;">
                Blogs
            </p>

            <h2 style="margin:0;">
                {{ $totalBlogs }}
            </h2>

        </div>


        <div style="
            background:white;
            padding:20px;
            border:1px solid #e5e7eb;
            border-radius:12px;
        ">

            <p style="color:#6b7280; margin:0 0 10px;">
                Views
            </p>

            <h2 style="margin:0;">
                {{ number_format($totalViews) }}
            </h2>

        </div>


        <div style="
            background:white;
            padding:20px;
            border:1px solid #e5e7eb;
            border-radius:12px;
        ">

            <p style="color:#6b7280; margin:0 0 10px;">
                Likes
            </p>

            <h2 style="margin:0;">
                {{ $totalLikes }}
            </h2>

        </div>


        <div style="
            background:white;
            padding:20px;
            border:1px solid #e5e7eb;
            border-radius:12px;
        ">

            <p style="color:#6b7280; margin:0 0 10px;">
                Comments
            </p>

            <h2 style="margin:0;">
                {{ $totalComments }}
            </h2>

        </div>

    </div>


    {{-- Most Viewed Blogs --}}

    <div style="
        background:white;
        border:1px solid #e5e7eb;
        border-radius:12px;
        padding:20px;
        margin-bottom:25px;
    ">

        <h2 style="margin-top:0; font-size:20px;">
            Most Viewed Blogs
        </h2>


        @forelse($mostViewedBlogs as $blog)

            <div style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                padding:13px 0;
                border-bottom:1px solid #e5e7eb;
            ">

                <span>
                    {{ $blog->title }}
                </span>

                <strong>
                    {{ number_format($blog->views ?? 0) }}
                    views
                </strong>

            </div>

        @empty

            <p style="color:#6b7280;">
                No analytics available.
            </p>

        @endforelse

    </div>


    {{-- Recent Blogs --}}

    <div style="
        background:white;
        border:1px solid #e5e7eb;
        border-radius:12px;
        padding:20px;
    ">

        <h2 style="margin-top:0; font-size:20px;">
            Recently Published
        </h2>

        @forelse($recentBlogs as $blog)

            <div style="
                display:flex;
                justify-content:space-between;
                padding:12px 0;
                border-bottom:1px solid #e5e7eb;
            ">

                <span>
                    {{ $blog->title }}
                </span>

                <span style="color:#6b7280;">
                    {{ $blog->created_at->format('d M Y') }}
                </span>

            </div>

        @empty

            <p>No blogs available.</p>

        @endforelse

    </div>

</div>