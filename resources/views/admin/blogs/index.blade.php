<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Blogs</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="margin:0; font-family:Arial, sans-serif; background:#f3f4f6;">

    <!-- Header -->
    <div style="
        background:#111827;
        color:white;
        padding:16px 30px;
        display:flex;
        justify-content:space-between;
        align-items:center;
    ">

        <h2 style="margin:0;">Manage Blogs</h2>

        <div>
            <a
                href="{{ route('admin.dashboard') }}"
                style="
                    color:white;
                    text-decoration:none;
                    margin-right:20px;
                "
            >
                Dashboard
            </a>

            <a
                href="{{ route('admin.blogs.create') }}"
                style="
                    background:#2563eb;
                    color:white;
                    padding:10px 15px;
                    border-radius:5px;
                    text-decoration:none;
                "
            >
                + Create Blog
            </a>
        </div>

    </div>


    <div style="padding:30px;">

        <!-- Success Message -->
        @if(session('success'))

            <div style="
                background:#dcfce7;
                color:#166534;
                padding:12px;
                border-radius:5px;
                margin-bottom:20px;
            ">
                {{ session('success') }}
            </div>

        @endif


        <!-- Search / Filter -->
        <form
            method="GET"
            action="{{ route('admin.blogs.index') }}"
            style="
                background:white;
                padding:20px;
                margin-bottom:20px;
                border-radius:8px;
                display:flex;
                gap:10px;
                flex-wrap:wrap;
            "
        >

            <!-- Search -->
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search blog title..."
                style="
                    padding:10px;
                    border:1px solid #ccc;
                    border-radius:4px;
                "
            >


            <!-- Category Filter -->
            <select
                name="category"
                style="
                    padding:10px;
                    border:1px solid #ccc;
                    border-radius:4px;
                "
            >

                <option value="">
                    All Categories
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>


            <!-- Sorting -->
            <select
                name="sort"
                style="
                    padding:10px;
                    border:1px solid #ccc;
                    border-radius:4px;
                "
            >

                <option
                    value="latest"
                    {{ request('sort') == 'latest' ? 'selected' : '' }}
                >
                    Latest
                </option>

                <option
                    value="oldest"
                    {{ request('sort') == 'oldest' ? 'selected' : '' }}
                >
                    Oldest
                </option>

                <option
                    value="az"
                    {{ request('sort') == 'az' ? 'selected' : '' }}
                >
                    A-Z
                </option>

            </select>


            <!-- Per Page -->
            <select
                name="per_page"
                style="
                    padding:10px;
                    border:1px solid #ccc;
                    border-radius:4px;
                "
            >

                @foreach([10, 20, 30, 40, 50] as $number)

                    <option
                        value="{{ $number }}"
                        {{ request('per_page', 10) == $number ? 'selected' : '' }}
                    >
                        {{ $number }} per page
                    </option>

                @endforeach

            </select>


            <button
                type="submit"
                style="
                    background:#111827;
                    color:white;
                    border:none;
                    padding:10px 18px;
                    cursor:pointer;
                    border-radius:4px;
                "
            >
                Filter
            </button>

        </form>


        <!-- Blogs Table -->
        <div style="
            background:white;
            padding:20px;
            border-radius:8px;
            overflow-x:auto;
            box-shadow:0 2px 8px rgba(0,0,0,0.05);
        ">

            <table style="
                width:100%;
                border-collapse:collapse;
            ">

                <thead>

                    <tr style="background:#f3f4f6;">

                        <th style="padding:12px; text-align:left;">
                            ID
                        </th>

                        <th style="padding:12px; text-align:left;">
                            Title
                        </th>

                        <th style="padding:12px; text-align:left;">
                            Category
                        </th>

                        <th style="padding:12px; text-align:left;">
                            Views
                        </th>

                        <th style="padding:12px; text-align:left;">
                            Created
                        </th>

                        <th style="padding:12px; text-align:left;">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($blogs as $blog)

                        <tr style="border-bottom:1px solid #ddd;">

                            <!-- ID -->
                            <td style="padding:12px;">
                                {{ $blog->id }}
                            </td>


                            <!-- Title -->
                            <td style="padding:12px;">
                                {{ $blog->title }}
                            </td>


                            <!-- Category -->
                            <td style="padding:12px;">
                                {{ $blog->category?->name ?? 'N/A' }}
                            </td>


                            <!-- Views -->
                            <td style="padding:12px;">
                                {{ $blog->views }}
                            </td>


                            <!-- Created Date -->
                            <td style="padding:12px;">
                                {{ $blog->created_at->format('d M Y') }}
                            </td>


                            <!-- Actions -->
                            <td style="padding:12px;">

                                <!-- View -->
                                <a
                                    href="{{ route('admin.blogs.show', $blog) }}"
                                    style="
                                        color:#2563eb;
                                        margin-right:10px;
                                        text-decoration:none;
                                    "
                                >
                                    View
                                </a>


                                <!-- Edit -->
                                <a
                                    href="{{ route('admin.blogs.edit', $blog) }}"
                                    style="
                                        color:#16a34a;
                                        margin-right:10px;
                                        text-decoration:none;
                                    "
                                >
                                    Edit
                                </a>


                                <!-- Delete -->
                                <form
                                    action="{{ route('admin.blogs.destroy', $blog) }}"
                                    method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this blog?');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        style="
                                            color:#dc2626;
                                            background:none;
                                            border:none;
                                            cursor:pointer;
                                        "
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                style="
                                    text-align:center;
                                    padding:40px;
                                    color:#666;
                                "
                            >
                                No blogs found.

                                <br><br>

                                <a
                                    href="{{ route('admin.blogs.create') }}"
                                    style="
                                        color:#2563eb;
                                        text-decoration:none;
                                    "
                                >
                                    Create your first blog
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- Pagination -->
        @if($blogs->hasPages())

            <div style="margin-top:20px;">
                {{ $blogs->links() }}
            </div>

        @endif

    </div>

</body>
</html>