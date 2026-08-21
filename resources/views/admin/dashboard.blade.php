<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #111827;
        }


        /* ==========================================
           DASHBOARD LAYOUT
        ========================================== */

        .dashboard-layout {
            display: grid;

            grid-template-columns:
                220px
                minmax(0, 1fr)
                280px;

            min-height: 100vh;
        }


        /* ==========================================
           SIDEBAR
        ========================================== */

        .sidebar {
            background: #ffffff;

            border-right: 1px solid #e5e7eb;

            padding: 22px 18px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            position: sticky;
            top: 0;

            height: 100vh;

            overflow-y: auto;
        }


        .brand {
            font-size: 22px;
            font-weight: 800;

            margin-bottom: 30px;

            color: #111827;
        }


        .menu {
            display: flex;
            flex-direction: column;

            gap: 8px;
        }


        .menu a {
            display: block;

            text-decoration: none;

            color: #4b5563;

            padding: 11px 13px;

            border-radius: 8px;

            font-size: 14px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s;
        }


        .menu a:hover {
            background: #f3f4f6;
            color: #2563eb;
        }


        .menu a.active {
            background: #eff6ff;
            color: #2563eb;
        }


        /* ==========================================
           LOGOUT
        ========================================== */

        .logout-form {
            margin: 0;
        }


        .logout-btn {
            width: 100%;

            border: none;

            background: #111827;

            color: white;

            padding: 11px;

            border-radius: 8px;

            cursor: pointer;

            font-weight: 600;

            transition: .2s;
        }


        .logout-btn:hover {
            background: #dc2626;
        }


        /* ==========================================
           MAIN CONTENT
        ========================================== */

        .main-content {
            min-width: 0;

            padding: 22px 28px;
        }


        /* ==========================================
           TOPBAR
        ========================================== */

        .topbar {
            display: flex;

            justify-content: space-between;
            align-items: center;

            gap: 20px;

            margin-bottom: 25px;
        }


        .search-box {
            width: 320px;

            background: white;

            border: 1px solid #e5e7eb;

            padding: 10px 14px;

            border-radius: 8px;

            outline: none;
        }


        .search-box:focus {
            border-color: #2563eb;
        }


        .admin-info {
            font-size: 14px;

            color: #6b7280;

            white-space: nowrap;
        }


        /* ==========================================
           AJAX AREA
        ========================================== */

        #admin-content {
            width: 100%;

            min-width: 0;
        }


        /* ==========================================
           PAGE TITLE
        ========================================== */

        .page-title h1 {
            margin: 0;

            font-size: 28px;
        }


        .page-title p {
            margin: 5px 0 0;

            color: #6b7280;

            font-size: 14px;
        }


        /* ==========================================
           STATS
        ========================================== */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 18px;

            margin-top: 25px;
        }


        .stat-card {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            padding: 20px;

            box-shadow:
                0 3px 12px rgba(0, 0, 0, .04);
        }


        .stat-label {
            color: #6b7280;

            font-size: 13px;

            margin-bottom: 8px;
        }


        .stat-value {
            font-size: 28px;
            font-weight: 800;
        }


        /* ==========================================
           SECTION
        ========================================== */

        .section-title {
            margin: 30px 0 15px;

            display: flex;

            justify-content: space-between;
            align-items: center;

            gap: 15px;
        }


        .section-title h2 {
            margin: 0;

            font-size: 20px;
        }


        .manage-btn {
            display: inline-block;

            background: #2563eb;

            color: white;

            text-decoration: none;

            padding: 9px 14px;

            border-radius: 7px;

            border: none;

            cursor: pointer;

            font-size: 13px;
            font-weight: 600;
        }


        .manage-btn:hover {
            background: #1d4ed8;
        }


        /* ==========================================
           BLOG CARDS
        ========================================== */

        .blog-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 18px;
        }


        .blog-card {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            overflow: hidden;

            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }


        .blog-card:hover {
            transform: translateY(-3px);

            box-shadow:
                0 8px 20px rgba(0, 0, 0, .08);
        }


        .blog-image {
            display: block;

            width: 100%;
            height: 150px;

            object-fit: cover;

            background: #e5e7eb;
        }


        .blog-card-body {
            padding: 15px;
        }


        .blog-card-body h3 {
            margin: 0 0 8px;

            font-size: 15px;
        }


        .blog-meta {
            font-size: 12px;

            color: #6b7280;
        }


        /* ==========================================
           RIGHT PANEL
        ========================================== */

        .right-panel {
            background: #ffffff;

            border-left: 1px solid #e5e7eb;

            padding: 22px 18px;

            position: sticky;
            top: 0;

            height: 100vh;

            overflow-y: auto;
        }


        .right-panel h3 {
            margin-top: 0;
        }


        .progress-card,
        .mini-card {
            background: #f9fafb;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            padding: 16px;

            margin-bottom: 18px;
        }


        /* ==========================================
           CIRCLE
        ========================================== */

        .circle {
            width: 110px;
            height: 110px;

            border-radius: 50%;

            border: 10px solid #dbeafe;

            border-top-color: #2563eb;

            margin: 10px auto;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 22px;
            font-weight: 800;
        }


        /* ==========================================
           QUICK STATS
        ========================================== */

        .mini-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 10px;
        }


        .mini-stat {
            background: white;

            border-radius: 8px;

            padding: 12px;

            text-align: center;

            border: 1px solid #e5e7eb;
        }


        .mini-stat strong {
            display: block;

            font-size: 20px;
        }


        .mini-stat span {
            color: #6b7280;

            font-size: 11px;
        }


        /* ==========================================
           AJAX LOADER
        ========================================== */

        .ajax-loading {
            min-height: 400px;

            display: flex;

            flex-direction: column;

            align-items: center;
            justify-content: center;

            gap: 12px;

            color: #6b7280;
        }


        .loading-spinner {
            width: 40px;
            height: 40px;

            border: 4px solid #e5e7eb;

            border-top-color: #2563eb;

            border-radius: 50%;

            animation: spin .7s linear infinite;
        }


        @keyframes spin {

            to {
                transform: rotate(360deg);
            }

        }


        /* ==========================================
           ERROR
        ========================================== */

        .ajax-error {
            background: #fee2e2;

            color: #991b1b;

            border: 1px solid #fecaca;

            padding: 20px;

            border-radius: 10px;
        }


        .ajax-error h3 {
            margin-top: 0;
        }


        /* ==========================================
           SUCCESS
        ========================================== */

        .ajax-success {
            background: #dcfce7;

            color: #166534;

            border: 1px solid #bbf7d0;

            padding: 13px 16px;

            border-radius: 8px;

            margin-bottom: 20px;
        }


        /* ==========================================
           VALIDATION
        ========================================== */

        .ajax-validation-errors {
            background: #fee2e2;

            color: #991b1b;

            border: 1px solid #fecaca;

            padding: 15px;

            border-radius: 8px;

            margin-bottom: 20px;
        }


        .ajax-validation-errors ul {
            margin-bottom: 0;
        }


        /* ==========================================
           RESPONSIVE
        ========================================== */

        @media (max-width:1100px) {

            .dashboard-layout {

                grid-template-columns:
                    190px
                    minmax(0,1fr);

            }


            .right-panel {
                display: none;
            }


            .stats-grid {

                grid-template-columns:
                    repeat(2,minmax(0,1fr));

            }


            .blog-grid {

                grid-template-columns:
                    repeat(2,minmax(0,1fr));

            }

        }


        @media (max-width:700px) {

            .dashboard-layout {
                display: block;
            }


            .sidebar {

                position: relative;

                height: auto;

                border-right: none;

                border-bottom:
                    1px solid #e5e7eb;

            }


            .menu {

                flex-direction: row;

                overflow-x: auto;

            }


            .menu a {
                white-space: nowrap;
            }


            .logout-form {
                margin-top: 15px;
            }


            .main-content {
                padding: 18px;
            }


            .stats-grid {
                grid-template-columns: 1fr;
            }


            .blog-grid {
                grid-template-columns: 1fr;
            }


            .topbar {

                flex-direction: column;

                align-items: stretch;

            }


            .search-box {
                width: 100%;
            }


            .admin-info {
                text-align: right;
            }

        }

    </style>

</head>


<body>


<div class="dashboard-layout">


    <!-- ==========================================
         LEFT SIDEBAR
    =========================================== -->

    <aside class="sidebar">


        <div>


            <div class="brand">
                BlogSpace
            </div>


            <nav class="menu">


                <!-- DASHBOARD -->

                <a
                    href="#"
                    class="ajax-menu active"
                    data-url="{{ route('admin.panel.dashboard') }}"
                    data-menu="dashboard"
                >
                    Dashboard
                </a>


                <!-- MANAGE BLOGS -->

                <a
                    href="#"
                    class="ajax-menu"
                    data-url="{{ route('admin.panel.blogs') }}"
                    data-menu="blogs"
                >
                    Manage Blogs
                </a>


                <!-- CREATE BLOG -->

                <a
                    href="#"
                    class="ajax-menu"
                    data-url="{{ route('admin.panel.create') }}"
                    data-menu="create"
                >
                    Create Blog
                </a>


                <!-- COMMENTS -->

                <a
                    href="#"
                    class="ajax-menu"
                    data-url="{{ route('admin.panel.comments') }}"
                    data-menu="comments"
                >
                    Comments
                </a>


                <!-- ANALYTICS -->

                <a
                    href="#"
                    class="ajax-menu"
                    data-url="{{ route('admin.panel.analytics') }}"
                    data-menu="analytics"
                >
                    Analytics
                </a>


            </nav>


        </div>



        <!-- LOGOUT -->

        <form
            method="POST"
            action="{{ route('admin.logout') }}"
            class="logout-form"
        >

            @csrf


            <button
                type="submit"
                class="logout-btn"
            >
                Logout
            </button>


        </form>


    </aside>



    <!-- ==========================================
         MAIN CONTENT
    =========================================== -->

    <main class="main-content">


        <!-- TOPBAR -->

        <div class="topbar">


            <input
                type="text"
                id="adminSearch"
                class="search-box"
                placeholder="Search anything..."
            >


            <div class="admin-info">
                Admin Panel
            </div>


        </div>



        <!-- ==========================================
             AJAX DYNAMIC CONTENT
        =========================================== -->

        <div id="admin-content">


            <!-- PAGE TITLE -->

            <div class="page-title">

                <h1>
                    Dashboard
                </h1>

                <p>
                    Manage your blog platform from one place.
                </p>

            </div>



            <!-- ==========================================
                 STATS
            =========================================== -->

            <div class="stats-grid">


                <div class="stat-card">

                    <div class="stat-label">
                        Total Blogs
                    </div>

                    <div class="stat-value">
                        {{ $totalBlogs }}
                    </div>

                </div>



                <div class="stat-card">

                    <div class="stat-label">
                        Total Views
                    </div>

                    <div class="stat-value">
                        {{ number_format($totalViews) }}
                    </div>

                </div>



                <div class="stat-card">

                    <div class="stat-label">
                        Total Likes
                    </div>

                    <div class="stat-value">
                        {{ $totalLikes }}
                    </div>

                </div>



                <div class="stat-card">

                    <div class="stat-label">
                        Total Comments
                    </div>

                    <div class="stat-value">
                        {{ $totalComments }}
                    </div>

                </div>


            </div>



            <!-- ==========================================
                 RECENT BLOGS
            =========================================== -->

            <div class="section-title">


                <h2>
                    Recent Blogs
                </h2>


                <button
                    type="button"
                    class="manage-btn ajax-action"
                    data-url="{{ route('admin.panel.blogs') }}"
                    data-menu-target="blogs"
                >
                    View All
                </button>


            </div>



            <div class="blog-grid">


                @forelse($recentBlogs ?? [] as $blog)


                    <div class="blog-card">


                        @if($blog->thumbnail)


                            <img
                                src="{{ asset('storage/' . $blog->thumbnail) }}"
                                class="blog-image"
                                alt="{{ $blog->title }}"
                                loading="lazy"
                            >


                        @else


                            <div
                                class="blog-image"
                                style="
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    color:#6b7280;
                                "
                            >
                                No Image
                            </div>


                        @endif



                        <div class="blog-card-body">


                            <h3>

                                {{
                                    \Illuminate\Support\Str::limit(
                                        $blog->title,
                                        45
                                    )
                                }}

                            </h3>


                            <div class="blog-meta">

                                {{
                                    $blog->created_at
                                        ->format('d M Y')
                                }}

                                ·

                                {{ $blog->views ?? 0 }} views

                            </div>


                        </div>


                    </div>


                @empty


                    <p>
                        No recent blogs found.
                    </p>


                @endforelse


            </div>


        </div>


    </main>



    <!-- ==========================================
         RIGHT PANEL
    =========================================== -->

    <aside class="right-panel">


        <h3>
            Overview
        </h3>



        <!-- PLATFORM ACTIVITY -->

        <div class="progress-card">


            <div
                style="
                    font-size:13px;
                    color:#6b7280;
                "
            >
                Platform Activity
            </div>


            <div class="circle">
                75%
            </div>


        </div>



        <!-- QUICK STATS -->

        <div class="mini-card">


            <div
                style="
                    margin-bottom:12px;
                    font-weight:700;
                "
            >
                Quick Stats
            </div>



            <div class="mini-grid">


                <div class="mini-stat">

                    <strong id="quickBlogs">
                        {{ $totalBlogs }}
                    </strong>

                    <span>
                        Blogs
                    </span>

                </div>



                <div class="mini-stat">

                    <strong id="quickLikes">
                        {{ $totalLikes }}
                    </strong>

                    <span>
                        Likes
                    </span>

                </div>



                <div class="mini-stat">

                    <strong id="quickViews">
                        {{ number_format($totalViews) }}
                    </strong>

                    <span>
                        Views
                    </span>

                </div>



                <div class="mini-stat">

                    <strong id="quickComments">
                        {{ $totalComments }}
                    </strong>

                    <span>
                        Comments
                    </span>

                </div>


            </div>


        </div>


    </aside>


</div>



<!-- ==============================================
     JAVASCRIPT
============================================== -->

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        const contentArea =
            document.getElementById(
                'admin-content'
            );


        const menuLinks =
            document.querySelectorAll(
                '.ajax-menu'
            );



        /*
        |--------------------------------------------------------------------------
        | SET ACTIVE MENU
        |--------------------------------------------------------------------------
        */

        function setActiveMenu(menuName) {


            menuLinks.forEach(
                function (link) {


                    link.classList.remove(
                        'active'
                    );


                    if (
                        link.dataset.menu ===
                        menuName
                    ) {

                        link.classList.add(
                            'active'
                        );

                    }


                }
            );


        }



        /*
        |--------------------------------------------------------------------------
        | SAFE URL
        |--------------------------------------------------------------------------
        |
        | Laravel pagination / route() production proxy ke peeche
        | kabhi http:// URL return kar sakta hai.
        |
        | Ye function host/protocol ko remove karke sirf
        | pathname + query return karta hai.
        |
        | Example:
        |
        | http://domain.com/admin/panel/blogs?page=2
        |
        | becomes:
        |
        | /admin/panel/blogs?page=2
        |
        |--------------------------------------------------------------------------
        */

        function getSafeUrl(url) {

            if (!url) {
                return null;
            }


            try {

                const parsedUrl =
                    new URL(
                        url,
                        window.location.origin
                    );


                return (
                    parsedUrl.pathname +
                    parsedUrl.search +
                    parsedUrl.hash
                );

            } catch (error) {

                console.error(
                    'Invalid URL:',
                    url
                );


                return url;

            }

        }



        /*
        |--------------------------------------------------------------------------
        | SHOW LOADER
        |--------------------------------------------------------------------------
        */

        function showLoading() {


            contentArea.innerHTML = `

                <div class="ajax-loading">

                    <div
                        class="loading-spinner"
                    ></div>

                    <div>
                        Loading...
                    </div>

                </div>

            `;


        }



        /*
        |--------------------------------------------------------------------------
        | SHOW ERROR
        |--------------------------------------------------------------------------
        */

        function showError(
            message = 'Content load nahi ho paya.'
        ) {


            contentArea.innerHTML = `

                <div class="ajax-error">

                    <h3>
                        Something went wrong
                    </h3>

                    <p>
                        ${message}
                    </p>

                </div>

            `;


        }



        /*
        |--------------------------------------------------------------------------
        | LOAD AJAX CONTENT
        |--------------------------------------------------------------------------
        */

        async function loadAdminContent(
            url,
            menuName = null
        ) {


            if (!url) {
                return;
            }


            if (menuName) {

                setActiveMenu(
                    menuName
                );

            }


            showLoading();


            try {


                /*
                |--------------------------------------------------------------------------
                | CONVERT URL TO SAME ORIGIN
                |--------------------------------------------------------------------------
                */

                const safeUrl =
                    getSafeUrl(url);


                if (!safeUrl) {

                    throw new Error(
                        'Invalid request URL'
                    );

                }



                /*
                |--------------------------------------------------------------------------
                | AJAX REQUEST
                |--------------------------------------------------------------------------
                */

                const response =
                    await fetch(
                        safeUrl,
                        {

                            method: 'GET',

                            headers: {

                                'X-Requested-With':
                                    'XMLHttpRequest',

                                'Accept':
                                    'text/html'

                            },

                            credentials:
                                'same-origin'

                        }
                    );



                /*
                |--------------------------------------------------------------------------
                | SESSION EXPIRED
                |--------------------------------------------------------------------------
                */

                if (
                    response.status === 401 ||
                    response.status === 419
                ) {


                    window.location.href =
                        '/admin/login';


                    return;

                }



                /*
                |--------------------------------------------------------------------------
                | HTTP ERROR
                |--------------------------------------------------------------------------
                */

                if (!response.ok) {


                    throw new Error(
                        'HTTP Error: ' +
                        response.status
                    );


                }



                /*
                |--------------------------------------------------------------------------
                | RESPONSE HTML
                |--------------------------------------------------------------------------
                */

                const html =
                    await response.text();


                contentArea.innerHTML =
                    html;



                /*
                |--------------------------------------------------------------------------
                | SCROLL TOP
                |--------------------------------------------------------------------------
                */

                window.scrollTo({

                    top: 0,

                    behavior: 'smooth'

                });


            }
            catch (error) {


                console.error(
                    'Admin AJAX error:',
                    error
                );


                showError(
                    'Content load nahi ho paya.'
                );


            }


        }



        /*
        |--------------------------------------------------------------------------
        | SIDEBAR CLICK
        |--------------------------------------------------------------------------
        */

        menuLinks.forEach(
            function (link) {


                link.addEventListener(
                    'click',
                    function (event) {


                        event.preventDefault();


                        loadAdminContent(

                            this.dataset.url,

                            this.dataset.menu

                        );


                    }
                );


            }
        );



        /*
        |--------------------------------------------------------------------------
        | AJAX ACTION BUTTONS
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'click',
            function (event) {


                const button =
                    event.target.closest(
                        '.ajax-action, .ajax-nav'
                    );


                if (!button) {
                    return;
                }


                event.preventDefault();


                const url =
                    button.dataset.url;


                const menuName =

                    button.dataset.menuTarget ||

                    button.dataset.menu ||

                    null;


                loadAdminContent(
                    url,
                    menuName
                );


            }
        );



        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'click',
            function (event) {


                const link =
                    event.target.closest(
                        '#admin-content nav a'
                    );


                if (!link) {
                    return;
                }


                const url =
                    link.getAttribute(
                        'href'
                    );


                if (!url) {
                    return;
                }


                event.preventDefault();


                /*
                |--------------------------------------------------------------------------
                | IMPORTANT
                |--------------------------------------------------------------------------
                |
                | Pagination URL ko loadAdminContent() ke through bheja ja raha hai.
                | loadAdminContent() URL ko same-origin relative URL me convert karega.
                |
                |--------------------------------------------------------------------------
                */

                loadAdminContent(
                    url,
                    'blogs'
                );


            }
        );



        /*
        |--------------------------------------------------------------------------
        | CREATE BLOG AJAX
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'submit',
            async function (event) {


                const form =
                    event.target;


                if (
                    form.id !==
                    'createBlogForm'
                ) {

                    return;

                }


                event.preventDefault();



                const submitButton =
                    form.querySelector(
                        'button[type="submit"]'
                    );


                const originalText =
                    submitButton
                        ? submitButton.innerHTML
                        : '';



                if (submitButton) {


                    submitButton.disabled =
                        true;


                    submitButton.innerHTML =
                        'Creating...';


                }



                /*
                |--------------------------------------------------------------------------
                | REMOVE PREVIOUS ERRORS
                |--------------------------------------------------------------------------
                */

                const oldErrors =
                    form.querySelector(
                        '.ajax-validation-errors'
                    );


                if (oldErrors) {

                    oldErrors.remove();

                }



                try {


                    const formData =
                        new FormData(
                            form
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | SAFE FORM ACTION
                    |--------------------------------------------------------------------------
                    */

                    const safeAction =
                        getSafeUrl(
                            form.action
                        );


                    const response =
                        await fetch(
                            safeAction,
                            {

                                method: 'POST',

                                body: formData,

                                headers: {

                                    'X-Requested-With':
                                        'XMLHttpRequest',

                                    'Accept':
                                        'application/json'

                                },

                                credentials:
                                    'same-origin'

                            }
                        );



                    /*
                    |--------------------------------------------------------------------------
                    | VALIDATION ERROR
                    |--------------------------------------------------------------------------
                    */

                    if (
                        response.status ===
                        422
                    ) {


                        const data =
                            await response.json();


                        let errorHtml = `

                            <div
                                class="
                                    ajax-validation-errors
                                "
                            >

                                <strong>
                                    Please fix these errors:
                                </strong>

                                <ul>

                        `;



                        Object.values(
                            data.errors || {}
                        )
                        .forEach(
                            function (messages) {


                                messages.forEach(
                                    function (message) {


                                        errorHtml += `

                                            <li>
                                                ${message}
                                            </li>

                                        `;


                                    }
                                );


                            }
                        );


                        errorHtml += `

                                </ul>

                            </div>

                        `;



                        form.insertAdjacentHTML(

                            'afterbegin',

                            errorHtml

                        );



                        if (submitButton) {


                            submitButton.disabled =
                                false;


                            submitButton.innerHTML =
                                originalText;


                        }


                        return;

                    }



                    /*
                    |--------------------------------------------------------------------------
                    | SESSION EXPIRED
                    |--------------------------------------------------------------------------
                    */

                    if (
                        response.status === 401 ||
                        response.status === 419
                    ) {


                        window.location.href =
                            '/admin/login';


                        return;

                    }



                    /*
                    |--------------------------------------------------------------------------
                    | REQUEST FAILED
                    |--------------------------------------------------------------------------
                    */

                    if (!response.ok) {


                        throw new Error(
                            'Create failed'
                        );


                    }



                    /*
                    |--------------------------------------------------------------------------
                    | BLOG CREATED
                    |--------------------------------------------------------------------------
                    */

                    await loadAdminContent(

                        "{{ route('admin.panel.blogs') }}",

                        'blogs'

                    );


                }
                catch (error) {


                    console.error(
                        'Blog create error:',
                        error
                    );


                    alert(
                        'Blog create nahi ho paya.'
                    );



                    if (submitButton) {


                        submitButton.disabled =
                            false;


                        submitButton.innerHTML =
                            originalText;


                    }


                }


            }
        );



        /*
        |--------------------------------------------------------------------------
        | DELETE BLOG AJAX
        |--------------------------------------------------------------------------
        */

        document.addEventListener(
            'submit',
            async function (event) {


                const form =
                    event.target;


                if (
                    !form.classList.contains(
                        'ajax-delete-blog'
                    )
                ) {

                    return;

                }


                event.preventDefault();



                const confirmed =
                    confirm(
                        'Are you sure you want to delete this blog?'
                    );


                if (!confirmed) {
                    return;
                }



                try {


                    const formData =
                        new FormData(
                            form
                        );


                    /*
                    |--------------------------------------------------------------------------
                    | SAFE FORM ACTION
                    |--------------------------------------------------------------------------
                    */

                    const safeAction =
                        getSafeUrl(
                            form.action
                        );


                    const response =
                        await fetch(
                            safeAction,
                            {

                                method: 'POST',

                                body: formData,

                                headers: {

                                    'X-Requested-With':
                                        'XMLHttpRequest',

                                    'Accept':
                                        'application/json'

                                },

                                credentials:
                                    'same-origin'

                            }
                        );



                    /*
                    |--------------------------------------------------------------------------
                    | SESSION EXPIRED
                    |--------------------------------------------------------------------------
                    */

                    if (
                        response.status === 401 ||
                        response.status === 419
                    ) {


                        window.location.href =
                            '/admin/login';


                        return;

                    }



                    /*
                    |--------------------------------------------------------------------------
                    | REQUEST FAILED
                    |--------------------------------------------------------------------------
                    */

                    if (!response.ok) {


                        throw new Error(
                            'Delete failed'
                        );


                    }



                    /*
                    |--------------------------------------------------------------------------
                    | REFRESH MANAGE BLOGS
                    |--------------------------------------------------------------------------
                    */

                    await loadAdminContent(

                        "{{ route('admin.panel.blogs') }}",

                        'blogs'

                    );


                }
                catch (error) {


                    console.error(
                        'Delete blog error:',
                        error
                    );


                    alert(
                        'Blog delete nahi ho paya.'
                    );


                }


            }
        );



        /*
        |--------------------------------------------------------------------------
        | ADMIN SEARCH
        |--------------------------------------------------------------------------
        */

        const adminSearch =
            document.getElementById(
                'adminSearch'
            );


        if (adminSearch) {


            adminSearch.addEventListener(
                'input',
                function () {


                    const value =
                        this.value
                            .toLowerCase()
                            .trim();


                    const rows =
                        contentArea
                            .querySelectorAll(
                                'tbody tr'
                            );


                    rows.forEach(
                        function (row) {


                            const text =
                                row.innerText
                                    .toLowerCase();


                            row.style.display =

                                text.includes(
                                    value
                                )

                                    ? ''

                                    : 'none';


                        }
                    );


                }
            );


        }


    }
);

</script>


</body>

</html>