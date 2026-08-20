<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        /* ==========================================
           RESET
        ========================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            min-height: 100vh;
            min-height: 100dvh;

            font-family: Arial, sans-serif;

            background: linear-gradient(
                135deg,
                #2a003f 0%,
                #52006a 50%,
                #1d103f 100%
            );

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;

            overflow-x: hidden;
            overflow-y: auto;

            padding: 30px 20px;
        }


        /* ==========================================
           BACKGROUND GLOW
        ========================================== */

        body::before,
        body::after {
            content: "";

            position: fixed;

            border-radius: 50%;

            filter: blur(12px);

            opacity: 0.35;

            pointer-events: none;
        }

        body::before {
            width: 210px;
            height: 210px;

            background: #8b5cf6;

            top: -65px;
            right: -50px;
        }

        body::after {
            width: 175px;
            height: 175px;

            background: #3b82f6;

            bottom: -55px;
            left: -55px;
        }


        /* ==========================================
           MAIN WRAPPER
        ========================================== */

        .wrapper {
            width: min(880px, 100%);

            min-height: 496px;

            display: grid;

            grid-template-columns: 1.2fr 0.9fr;

            position: relative;

            overflow: hidden;

            border-radius: 24px;

            background: rgba(
                38,
                0,
                58,
                0.55
            );

            box-shadow:
                0 16px 48px
                rgba(0, 0, 0, 0.35);

            backdrop-filter: blur(8px);

            -webkit-backdrop-filter: blur(8px);

            margin: auto;
        }


        /* ==========================================
           WRAPPER SHAPES
        ========================================== */

        .wrapper::before {
            content: "";

            position: absolute;

            width: 240px;
            height: 240px;

            left: 0;
            bottom: 0;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.04
                );

            clip-path:
                polygon(
                    0 0,
                    100% 0,
                    0 100%
                );

            pointer-events: none;
        }

        .wrapper::after {
            content: "";

            position: absolute;

            width: 145px;
            height: 145px;

            top: 32px;
            right: 32px;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.05
                );

            border-radius: 20px;

            transform:
                rotate(15deg);

            pointer-events: none;
        }


        /* ==========================================
           LEFT PANEL
        ========================================== */

        .left-panel {
            padding: 56px 48px;

            color: #ffffff;

            position: relative;

            z-index: 2;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }


        /* ==========================================
           BRAND ICON
        ========================================== */

        .brand-icon {
            width: 30px;
            height: 30px;

            margin-bottom: 32px;

            position: relative;
        }

        .brand-icon::before,
        .brand-icon::after {
            content: "";

            position: absolute;

            background: #ffffff;

            border-radius: 2px;
        }

        .brand-icon::before {
            width: 8px;
            height: 18px;

            left: 0;
            top: 6px;
        }

        .brand-icon::after {
            width: 8px;
            height: 8px;

            left: 13px;
            top: 6px;
        }


        /* ==========================================
           LEFT TITLE
        ========================================== */

        .left-panel h1 {
            font-size: 46px;

            line-height: 1.1;

            margin-bottom: 16px;

            font-weight: 800;
        }


        /* ==========================================
           TITLE LINE
        ========================================== */

        .line {
            width: 96px;

            height: 2px;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.55
                );

            margin-bottom: 18px;
        }


        /* ==========================================
           DESCRIPTION
        ========================================== */

        .left-panel p {
            max-width: 340px;

            font-size: 12px;

            line-height: 1.8;

            margin-bottom: 28px;

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.75
                );
        }


        /* ==========================================
           EXPLORE BUTTON
        ========================================== */

        .learn-btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            width: fit-content;

            min-height: 40px;

            padding: 10px 20px;

            border-radius: 999px;

            text-decoration: none;

            font-size: 11px;

            font-weight: 700;

            color: #ffffff;

            background:
                linear-gradient(
                    90deg,
                    #ff9a3c,
                    #ff2d75
                );

            box-shadow:
                0 8px 20px
                rgba(
                    255,
                    88,
                    128,
                    0.25
                );

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .learn-btn:hover {
            transform: translateY(-2px);

            box-shadow:
                0 12px 26px
                rgba(
                    255,
                    88,
                    128,
                    0.32
                );
        }


        /* ==========================================
           RIGHT PANEL
        ========================================== */

        .right-panel {
            padding: 32px;

            position: relative;

            z-index: 2;

            display: flex;

            align-items: center;

            justify-content: center;
        }


        /* ==========================================
           LOGIN CARD
        ========================================== */

        .login-card {
            width: 100%;

            max-width: 304px;

            padding: 32px 26px;

            border-radius: 15px;

            color: #ffffff;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.12
                );

            border:
                1px solid
                rgba(
                    255,
                    255,
                    255,
                    0.12
                );

            backdrop-filter: blur(14px);

            -webkit-backdrop-filter: blur(14px);

            box-shadow:
                0 12px 24px
                rgba(
                    0,
                    0,
                    0,
                    0.18
                );
        }


        /* ==========================================
           LOGIN TITLE
        ========================================== */

        .login-card h2 {
            font-size: 34px;

            text-align: center;

            margin-bottom: 6px;

            font-weight: 800;
        }

        .login-card .sub-title {
            text-align: center;

            font-size: 11px;

            margin-bottom: 22px;

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.75
                );
        }


        /* ==========================================
           ERROR BOX
        ========================================== */

        .error-box {
            padding: 10px 12px;

            margin-bottom: 15px;

            border-radius: 8px;

            font-size: 11px;

            color: #ffd7d7;

            background:
                rgba(
                    255,
                    99,
                    99,
                    0.18
                );

            border:
                1px solid
                rgba(
                    255,
                    110,
                    110,
                    0.35
                );
        }


        /* ==========================================
           FORM GROUP
        ========================================== */

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;

            margin-bottom: 6px;

            font-size: 10px;

            font-weight: 600;

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.9
                );
        }


        /* ==========================================
           INPUT
        ========================================== */

        .form-control {
            width: 100%;

            min-height: 42px;

            padding: 11px 14px;

            border-radius: 999px;

            border:
                1px solid transparent;

            outline: none;

            font-size: 11px;

            color: #ffffff;

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.14
                );

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .form-control::placeholder {
            color:
                rgba(
                    255,
                    255,
                    255,
                    0.55
                );
        }

        .form-control:focus {
            border-color:
                rgba(
                    59,
                    130,
                    246,
                    0.95
                );

            background:
                rgba(
                    255,
                    255,
                    255,
                    0.17
                );

            box-shadow:
                0 0 0 2px
                rgba(
                    59,
                    130,
                    246,
                    0.12
                );
        }


        /* ==========================================
           AUTOFILL FIX
        ========================================== */

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-text-fill-color:
                #ffffff !important;

            -webkit-box-shadow:
                0 0 0 1000px
                rgba(
                    255,
                    255,
                    255,
                    0.14
                )
                inset !important;

            transition:
                background-color
                9999s ease-in-out
                0s;
        }


        /* ==========================================
           REMEMBER ME
        ========================================== */

        .remember-row {
            margin-bottom: 18px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            font-size: 11px;

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.88
                );
        }

        .remember-row label {
            display: flex;

            align-items: center;

            gap: 6px;

            cursor: pointer;
        }

        .remember-row input[type="checkbox"] {
            width: 13px;

            height: 13px;

            cursor: pointer;
        }


        /* ==========================================
           SUBMIT BUTTON
        ========================================== */

        .submit-btn {
            width: 100%;

            min-height: 42px;

            padding: 11px 14px;

            border: none;

            outline: none;

            border-radius: 999px;

            cursor: pointer;

            font-size: 12px;

            font-weight: 700;

            color: #ffffff;

            background:
                linear-gradient(
                    90deg,
                    #ff9a3c,
                    #ff2d75
                );

            box-shadow:
                0 10px 20px
                rgba(
                    255,
                    77,
                    121,
                    0.25
                );

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .submit-btn:hover {
            transform:
                translateY(-2px);

            box-shadow:
                0 13px 25px
                rgba(
                    255,
                    77,
                    121,
                    0.32
                );
        }

        .submit-btn:active {
            transform:
                translateY(0);
        }


        /* ==========================================
           BOTTOM LINK
        ========================================== */

        .bottom-links {
            margin-top: 18px;

            text-align: center;

            font-size: 10px;

            color:
                rgba(
                    255,
                    255,
                    255,
                    0.75
                );
        }

        .bottom-links a {
            color: #ffffff;

            text-decoration: none;

            font-weight: 600;
        }

        .bottom-links a:hover {
            text-decoration: underline;
        }


        /* ==========================================
           TABLET / SMALL LAPTOP
        ========================================== */

        @media (max-width: 900px) {

            body {
                align-items: flex-start;

                padding: 25px 18px;
            }

            .wrapper {
                width: min(600px, 100%);

                grid-template-columns: 1fr;

                min-height: auto;
            }

            .left-panel {
                padding:
                    40px 30px 15px;

                text-align: center;

                align-items: center;
            }

            .brand-icon {
                margin-bottom: 24px;
            }

            .left-panel h1 {
                font-size: 38px;
            }

            .left-panel p {
                max-width: 420px;

                font-size: 12px;
            }

            .line {
                margin-left: auto;

                margin-right: auto;
            }

            .right-panel {
                padding:
                    18px 20px 35px;
            }

            .login-card {
                max-width: 340px;
            }
        }


        /* ==========================================
           MOBILE
        ========================================== */

        @media (max-width: 500px) {

            body {
                padding: 15px 12px;
            }

            .wrapper {
                border-radius: 18px;
            }

            .left-panel {
                padding:
                    35px 20px 10px;
            }

            .brand-icon {
                margin-bottom: 20px;
            }

            .left-panel h1 {
                font-size: 32px;
            }

            .line {
                width: 80px;

                margin-bottom: 16px;
            }

            .left-panel p {
                max-width: 100%;

                font-size: 12px;

                line-height: 1.7;

                margin-bottom: 20px;
            }

            .right-panel {
                padding:
                    15px 15px 28px;
            }

            .login-card {
                max-width: 100%;

                padding:
                    28px 20px;
            }

            .login-card h2 {
                font-size: 30px;
            }

            .form-control {
                font-size: 13px;
            }

            .form-group label {
                font-size: 11px;
            }

            .remember-row {
                font-size: 11px;
            }

            .submit-btn {
                font-size: 12px;
            }
        }


        /* ==========================================
           VERY SMALL MOBILE
        ========================================== */

        @media (max-width: 360px) {

            body {
                padding: 10px;
            }

            .left-panel {
                padding:
                    28px 16px 8px;
            }

            .left-panel h1 {
                font-size: 28px;
            }

            .right-panel {
                padding:
                    12px 12px 24px;
            }

            .login-card {
                padding:
                    24px 16px;
            }
        }


        /* ==========================================
           SMALL HEIGHT DESKTOP / LAPTOP
        ========================================== */

        @media
        (min-width: 901px)
        and
        (max-height: 650px) {

            body {
                padding:
                    15px 20px;
            }

            .wrapper {
                min-height: 470px;
            }

            .left-panel {
                padding:
                    42px 45px;
            }

            .right-panel {
                padding: 26px;
            }

            .brand-icon {
                margin-bottom: 24px;
            }

            .left-panel h1 {
                font-size: 42px;
            }

            .left-panel p {
                margin-bottom: 22px;
            }

            .login-card {
                padding:
                    28px 24px;
            }
        }

    </style>
</head>

<body>

    <div class="wrapper">

        {{-- ==========================================
             LEFT PANEL
        ========================================== --}}

        <div class="left-panel">

            <div class="brand-icon"></div>

            <h1>
                Welcome!
            </h1>

            <div class="line"></div>

            <p>
                Admin panel me login karke aap blogs manage kar sakte ho,
                create, update, delete aur complete content control kar sakte ho.
            </p>

            <a
                href="{{ route('blogs.index') }}"
                class="learn-btn"
            >
                Explore Blogs
            </a>

        </div>


        {{-- ==========================================
             RIGHT PANEL
        ========================================== --}}

        <div class="right-panel">

            <div class="login-card">

                <h2>
                    Sign in
                </h2>

                <div class="sub-title">
                    Admin access only
                </div>


                {{-- ERROR MESSAGE --}}

                @if ($errors->any())

                    <div class="error-box">
                        {{ $errors->first() }}
                    </div>

                @endif


                {{-- LOGIN FORM --}}

                <form
                    method="POST"
                    action="{{ route('admin.login.submit') }}"
                >

                    @csrf


                    {{-- EMAIL --}}

                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control"
                            placeholder="Enter your email"
                            autocomplete="email"
                            required
                            autofocus
                        >

                    </div>


                    {{-- PASSWORD --}}

                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required
                        >

                    </div>


                    {{-- REMEMBER ME --}}

                    <div class="remember-row">

                        <label for="remember">

                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                value="1"
                            >

                            <span>
                                Remember me
                            </span>

                        </label>

                    </div>


                    {{-- SUBMIT BUTTON --}}

                    <button
                        type="submit"
                        class="submit-btn"
                    >
                        Submit
                    </button>

                </form>


                {{-- HOME LINK --}}

                <div class="bottom-links">

                    Back to

                    <a href="{{ url('/') }}">
                        Home
                    </a>

                </div>

            </div>

        </div>

    </div>

</body>
</html>