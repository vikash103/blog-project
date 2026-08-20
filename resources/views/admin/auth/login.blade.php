<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #2a003f, #52006a, #1d103f);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* background shapes */
        body::before,
        body::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            filter: blur(10px);
            opacity: 0.35;
        }

        body::before {
            width: 260px;
            height: 260px;
            background: #8b5cf6;
            top: -80px;
            right: -60px;
        }

        body::after {
            width: 220px;
            height: 220px;
            background: #3b82f6;
            bottom: -70px;
            left: -70px;
        }

        .wrapper {
            width: 1100px;
            max-width: 95%;
            min-height: 620px;
            background: rgba(38, 0, 58, 0.55);
            border-radius: 30px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(8px);
            display: grid;
            grid-template-columns: 1.2fr 0.9fr;
        }

        /* extra decorative shapes */
        .wrapper::before {
            content: "";
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.04);
            clip-path: polygon(0 0, 100% 0, 0 100%);
            bottom: 0;
            left: 0;
        }

        .wrapper::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            background: rgba(255,255,255,0.05);
            border-radius: 25px;
            top: 40px;
            right: 40px;
            transform: rotate(15deg);
        }

        .left-panel {
            padding: 70px 60px;
            color: #fff;
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            margin-bottom: 40px;
            position: relative;
        }

        .brand-icon::before,
        .brand-icon::after {
            content: "";
            position: absolute;
            background: #fff;
            border-radius: 2px;
        }

        .brand-icon::before {
            width: 10px;
            height: 22px;
            left: 0;
            top: 8px;
        }

        .brand-icon::after {
            width: 10px;
            height: 10px;
            left: 16px;
            top: 8px;
        }

        .left-panel h1 {
            font-size: 58px;
            line-height: 1.1;
            margin-bottom: 20px;
            font-weight: 800;
        }

        .line {
            width: 120px;
            height: 2px;
            background: rgba(255,255,255,0.55);
            margin-bottom: 22px;
        }

        .left-panel p {
            max-width: 420px;
            color: rgba(255,255,255,0.75);
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 35px;
        }

        .learn-btn {
            display: inline-block;
            width: fit-content;
            padding: 12px 24px;
            border-radius: 999px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            color: #fff;
            background: linear-gradient(90deg, #ff9a3c, #ff2d75);
            box-shadow: 0 10px 24px rgba(255, 88, 128, 0.25);
        }

        .right-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            z-index: 2;
        }

        .login-card {
            width: 100%;
            max-width: 380px;
            background: rgba(255,255,255,0.12);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 18px;
            padding: 40px 32px;
            backdrop-filter: blur(14px);
            box-shadow: 0 14px 30px rgba(0,0,0,0.18);
            color: #fff;
        }

        .login-card h2 {
            font-size: 42px;
            text-align: center;
            margin-bottom: 8px;
            font-weight: 800;
        }

        .login-card .sub-title {
            text-align: center;
            font-size: 14px;
            color: rgba(255,255,255,0.75);
            margin-bottom: 28px;
        }

        .error-box {
            background: rgba(255, 99, 99, 0.18);
            border: 1px solid rgba(255, 110, 110, 0.35);
            color: #ffd7d7;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            margin-bottom: 8px;
            color: rgba(255,255,255,0.9);
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            border: none;
            outline: none;
            border-radius: 999px;
            padding: 14px 18px;
            background: rgba(255,255,255,0.14);
            color: #fff;
            font-size: 14px;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.55);
        }

        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            color: rgba(255,255,255,0.88);
            font-size: 14px;
        }

        .remember-row label {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .submit-btn {
            width: 100%;
            border: none;
            outline: none;
            padding: 14px 18px;
            border-radius: 999px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            color: white;
            background: linear-gradient(90deg, #ff9a3c, #ff2d75);
            box-shadow: 0 12px 24px rgba(255, 77, 121, 0.25);
            transition: 0.25s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(255, 77, 121, 0.32);
        }

        .bottom-links {
            text-align: center;
            margin-top: 22px;
            font-size: 13px;
            color: rgba(255,255,255,0.75);
        }

        .bottom-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        @media (max-width: 900px) {
            .wrapper {
                grid-template-columns: 1fr;
            }

            .left-panel {
                padding: 50px 30px 10px;
                text-align: center;
                align-items: center;
            }

            .left-panel h1 {
                font-size: 42px;
            }

            .line {
                margin-left: auto;
                margin-right: auto;
            }

            .right-panel {
                padding: 20px 20px 40px;
            }
        }

        @media (max-width: 500px) {
            .left-panel h1 {
                font-size: 34px;
            }

            .login-card {
                padding: 28px 20px;
            }

            .login-card h2 {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>

    <div class="wrapper">

        <!-- Left Side -->
        <div class="left-panel">
            <div class="brand-icon"></div>

            <h1>Welcome!</h1>

            <div class="line"></div>

            <p>
                Admin panel me login karke aap blogs manage kar sakte ho,
                create, update, delete aur complete content control kar sakte ho.
            </p>

            <a href="{{ route('blogs.index') }}" class="learn-btn">Explore Blogs</a>
        </div>

        <!-- Right Side -->
        <div class="right-panel">
            <div class="login-card">
                <h2>Sign in</h2>
                <div class="sub-title">Admin access only</div>

                @if ($errors->any())
                    <div class="error-box">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

                    <div class="form-group">
                        <label>Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control"
                            placeholder="Enter your email"
                            required
                            autofocus
                        >
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your password"
                            required
                        >
                    </div>

                    <div class="remember-row">
                        <label>
                            <input type="checkbox" name="remember" id="remember">
                            Remember me
                        </label>
                    </div>

                    <button type="submit" class="submit-btn">
                        Submit
                    </button>
                </form>

                <div class="bottom-links">
                    Back to
                    <a href="{{ url('/') }}">Home</a>
                </div>
            </div>
        </div>

    </div>

</body>
</html>