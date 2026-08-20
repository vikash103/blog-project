<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>BlogSpace</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Preconnect external image host -->
    <link
        rel="preconnect"
        href="https://images.unsplash.com"
    >

    <link
        rel="dns-prefetch"
        href="//images.unsplash.com"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #fffdfb;

            color: #111827;

            overflow-x: hidden;
        }


        /* ==========================================
           NAVBAR
        ========================================== */

        .navbar {
            height: 74px;

            padding: 0 48px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            background: #ffffff;

            border-bottom:
                1px solid #f1f1f1;

            position: sticky;

            top: 0;

            z-index: 100;
        }


        .logo {
            font-size: 24px;

            font-weight: 800;

            text-decoration: none;

            color: #111827;
        }


        .nav-links {
            display: flex;

            align-items: center;

            gap: 18px;
        }


        .nav-links a {
            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            color: #374151;
        }


        .nav-links a:hover {
            color: #f97316;
        }


        .admin-btn {
            background: #111827;

            color: white !important;

            padding: 10px 17px;

            border-radius: 8px;
        }


        /* ==========================================
           HERO
        ========================================== */

        .hero {
            min-height: 610px;

            overflow: hidden;

            position: relative;

            padding-top: 65px;
        }


        .hero-content {
            max-width: 800px;

            margin: auto;

            text-align: center;

            padding: 0 20px;

            position: relative;

            z-index: 10;
        }


        .eyebrow {
            color: #f97316;

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 15px;
        }


        .hero h1 {
            margin: 0;

            font-size: 54px;

            line-height: 1.08;

            letter-spacing: -1.5px;

            font-weight: 800;
        }


        .hero-description {
            max-width: 600px;

            margin: 18px auto 0;

            color: #6b7280;

            font-size: 15px;

            line-height: 1.7;
        }


        /* ==========================================
           BUTTONS
        ========================================== */

        .hero-actions {
            margin-top: 28px;

            display: flex;

            justify-content: center;

            flex-wrap: wrap;

            gap: 12px;
        }


        .btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            padding: 12px 19px;

            border-radius: 30px;

            text-decoration: none;

            font-size: 13px;

            font-weight: 700;

            transition:
                background-color .15s ease,
                color .15s ease;
        }


        .btn-primary {
            background: #111827;

            color: white;
        }


        .btn-primary:hover {
            background: #000000;
        }


        .btn-orange {
            background: #f97316;

            color: white;
        }


        .btn-orange:hover {
            background: #ea580c;
        }


        .btn-light {
            background: white;

            color: #111827;

            border:
                1px solid #e5e7eb;
        }


        /* ==========================================
           IMAGE CARDS
        ========================================== */

        .visual-area {
            max-width: 1100px;

            margin: 55px auto 0;

            height: 330px;

            position: relative;

            display: flex;

            justify-content: center;

            align-items: flex-start;

            gap: 14px;

            padding: 0 18px;
        }


        .visual-card {
            width: 175px;

            height: 235px;

            border-radius: 22px;

            overflow: hidden;

            background: #e5e7eb;

            flex-shrink: 0;

            /*
             * Lighter shadow
             */
            box-shadow:
                0 7px 18px
                rgba(0,0,0,.09);

            /*
             * No scale animation
             */
            transition: none;
        }
.visual-card img {
            display: block;

            width: 100%;

            height: 100%;

            object-fit: cover;

            /*
             * Prevent layout shifting
             */
            aspect-ratio: 175 / 235;
        }


        .card-1 {
            transform:
                translateY(38px)
                rotate(-7deg);
        }


        .card-2 {
            transform:
                translateY(9px)
                rotate(-4deg);
        }


        .card-3 {
            transform:
                translateY(-6px)
                rotate(-1deg);
        }


        .card-4 {
            transform:
                translateY(-6px)
                rotate(1deg);
        }


        .card-5 {
            transform:
                translateY(9px)
                rotate(4deg);
        }


        .card-6 {
            transform:
                translateY(38px)
                rotate(7deg);
        }


        /* ==========================================
           FEATURES
        ========================================== */

        .features-section {
            max-width: 1100px;

            margin: 30px auto 80px;

            padding: 0 20px;

            /*
             * Browser can skip rendering this
             * until it gets near viewport.
             */
            content-visibility: auto;

            contain-intrinsic-size:
                600px;
        }


        .features-title {
            text-align: center;

            margin-bottom: 35px;
        }


        .features-title span {
            color: #f97316;

            font-size: 13px;

            font-weight: 700;
        }


        .features-title h2 {
            font-size: 32px;

            margin: 8px 0 0;
        }


        .feature-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 20px;
        }


        .feature-card {
            border:
                1px solid #eeeeee;

            border-radius: 16px;

            padding: 26px;

            background: white;
        }


        .feature-number {
            color: #f97316;

            font-size: 12px;

            font-weight: 700;
        }


        .feature-card h3 {
            margin: 12px 0 8px;

            font-size: 18px;
        }


        .feature-card p {
            margin: 0;

            color: #6b7280;

            font-size: 14px;

            line-height: 1.6;
        }


        /* ==========================================
           FOOTER
        ========================================== */

        footer {
            background: #111827;

            color: #d1d5db;

            padding: 25px 20px;

            text-align: center;

            font-size: 13px;
        }


        /* ==========================================
           RESPONSIVE
        ========================================== */

        @media (max-width: 900px) {

            .hero h1 {
                font-size: 44px;
            }


            .visual-card {
                width: 140px;

                height: 200px;
            }


            .visual-area {
                overflow: hidden;
            }


            .feature-grid {
                grid-template-columns:
                    1fr;
            }

        }


        @media (max-width: 650px) {

            .navbar {
                padding: 0 20px;
            }


            .nav-links a:not(.admin-btn) {
                display: none;
            }


            .hero {
                padding-top: 55px;

                min-height: 560px;
            }


            .hero h1 {
                font-size: 36px;
            }


            .hero-description {
                font-size: 14px;
            }


            .visual-area {
                margin-top: 45px;

                height: 250px;

                gap: 8px;
            }


            .visual-card {
                width: 95px;

                height: 155px;

                border-radius: 14px;
            }


            .card-1,
            .card-6 {
                display: none;
            }

        }


        /*
        |--------------------------------------------------------------------------
        | Reduce animations on slower/reduced-motion systems
        |--------------------------------------------------------------------------
        */

        @media (
            prefers-reduced-motion:
            reduce
        ) {

            *,
            *::before,
            *::after {
                transition:
                    none !important;

                animation:
                    none !important;
            }

        }

    </style>

</head>


<body>


    <!-- ==========================================
         NAVBAR
    =========================================== -->

    <nav class="navbar">


        <a
            href="{{ url('/') }}"
            class="logo"
        >
            BlogSpace
        </a>


        <div class="nav-links">


            <a href="{{ url('/') }}">
                Home
            </a>


            <a
                href="{{ route('blogs.index') }}"
            >
                Explore Blogs
            </a>


            @guest

                <a
                    href="{{ route('google.login') }}"
                >
                    User Login
                </a>

            @endguest


            <a
                href="{{ route('admin.login') }}"
                class="admin-btn"
            >
                Admin Login
            </a>


        </div>


    </nav>



    <!-- ==========================================
         HERO
    =========================================== -->

    <section class="hero">


        <div class="hero-content">


            <div class="eyebrow">
                Behind the Stories
            </div>


            <h1>
                Curious What We’ve
                Created?
            </h1>


            <p class="hero-description">

                Discover useful articles, ideas and stories
                created through BlogSpace.

                Read, explore, like and join meaningful
                conversations.

            </p>



            <div class="hero-actions">


                <a
                    href="{{ route('blogs.index') }}"
                    class="btn btn-primary"
                >
                    Explore Blogs →
                </a>


                @auth


                    <a
                        href="{{ route('blogs.index') }}"
                        class="btn btn-light"
                    >
                        Continue as
                        {{ auth()->user()->name }}
                    </a>


                @else


                    <a
                        href="{{ route('google.login') }}"
                        class="btn btn-orange"
                    >
                        Login with Google
                    </a>


                @endauth


            </div>


        </div>



        <!-- ==========================================
             OPTIMIZED HERO IMAGES
        =========================================== -->

        <div class="visual-area">


            <!-- IMAGE 1 -->

            <div class="visual-card card-1">

                <img
                    src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=350&h=470&q=55"
                    alt="Technology"
                    width="350"
                    height="470"
                    decoding="async"
                    fetchpriority="high"
                >

            </div>



            <!-- IMAGE 2 -->

            <div class="visual-card card-2">

                <img
                    src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=350&h=470&q=55"
                    alt="Development"
                    width="350"
                    height="470"
                    decoding="async"
                >

            </div>



            <!-- IMAGE 3 -->

            <div class="visual-card card-3">

                <img
                    src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=350&h=470&q=55"
                    alt="Team working"
                    width="350"
                    height="470"
                    decoding="async"
                >

            </div>



            <!-- IMAGE 4 -->

            <div class="visual-card card-4">

                <img
                    src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=350&h=470&q=55"
                    alt="People working"
                    width="350"
                    height="470"
                    decoding="async"
                >

            </div>



            <!-- IMAGE 5 -->

            <div class="visual-card card-5">

                <img
                    src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=350&h=470&q=55"
                    alt="Writing"
                    width="350"
                    height="470"
                    decoding="async"
                    loading="lazy"
                >

            </div>



            <!-- IMAGE 6 -->

            <div class="visual-card card-6">

                <img
                    src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&w=350&h=470&q=55"
                    alt="Creativity"
                    width="350"
                    height="470"
                    decoding="async"
                    loading="lazy"
                >

            </div>


        </div>


    </section>



    <!-- ==========================================
         FEATURES
    =========================================== -->

    <section class="features-section">


        <div class="features-title">


            <span>
                Explore BlogSpace
            </span>


            <h2>
                Everything in One Place
            </h2>


        </div>



        <div class="feature-grid">


            <!-- FEATURE 1 -->

            <div class="feature-card">


                <span class="feature-number">
                    #01
                </span>


                <h3>
                    Discover Articles
                </h3>


                <p>
                    Explore useful content across
                    technology, development and
                    other categories.
                </p>


            </div>



            <!-- FEATURE 2 -->

            <div class="feature-card">


                <span class="feature-number">
                    #02
                </span>


                <h3>
                    Like & Comment
                </h3>


                <p>
                    Login using Google and interact
                    with articles through likes and
                    comments.
                </p>


            </div>



            <!-- FEATURE 3 -->

            <div class="feature-card">


                <span class="feature-number">
                    #03
                </span>


                <h3>
                    Admin Publishing
                </h3>


                <p>
                    Admins can create, update and
                    manage blogs using the protected
                    admin dashboard.
                </p>


            </div>


        </div>


    </section>



    <!-- ==========================================
         FOOTER
    =========================================== -->

    <footer>

        © {{ date('Y') }}
        BlogSpace.
        All rights reserved.

    </footer>


</body>

</html>