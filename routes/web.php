<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BlogController as PublicBlogController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;


// =====================================================
// HOME
// =====================================================

Route::get('/', function () {
    return view('welcome');
})->name('home');


// =====================================================
// PUBLIC BLOG ROUTES
// =====================================================

Route::get('/blogs', [PublicBlogController::class, 'index'])
    ->name('blogs.index');

Route::get('/blogs/{slug}', [PublicBlogController::class, 'show'])
    ->name('blogs.show');


// =====================================================
// GOOGLE LOGIN ROUTES
// =====================================================

Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])
    ->name('google.callback');


// =====================================================
// NORMAL USER ROUTES
// =====================================================

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {

    // =================================================
    // LIKE / UNLIKE
    // =================================================

    Route::post('/blogs/{blog}/like', [LikeController::class, 'toggle'])
        ->name('blogs.like');


    // =================================================
    // COMMENTS
    // =================================================

    Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])
        ->name('blogs.comments.store');

    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');


    // =================================================
    // PROFILE
    // =================================================

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


// =====================================================
// ADMIN ROUTES
// =====================================================

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        // =================================================
        // ADMIN ROOT
        // =================================================

        Route::get('/', function () {

            if (auth('admin')->check()) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('admin.login');

        })->name('root');


        // =================================================
        // ADMIN LOGIN
        // =================================================

        Route::get('/login', [AdminAuthController::class, 'showLogin'])
            ->name('login');

        Route::post('/login', [AdminAuthController::class, 'login'])
            ->name('login.submit');


        // =================================================
        // PROTECTED ADMIN ROUTES
        // =================================================

        Route::middleware('admin')->group(function () {

            // =============================================
            // MAIN ADMIN DASHBOARD
            // =============================================

            Route::get(
                '/dashboard',
                [DashboardController::class, 'index']
            )->name('dashboard');


            // =============================================
            // AJAX ADMIN PANEL ROUTES
            //
            // Sidebar click par full page reload nahi hoga.
            // Sirf dashboard ka center content change hoga.
            // =============================================

            Route::prefix('panel')
                ->name('panel.')
                ->group(function () {

                    // Dashboard
                    Route::get(
                        '/dashboard',
                        [DashboardController::class, 'dashboardPartial']
                    )->name('dashboard');


                    // Manage Blogs
                    Route::get(
                        '/blogs',
                        [DashboardController::class, 'blogsPartial']
                    )->name('blogs');


                    // Create Blog
                    Route::get(
                        '/create-blog',
                        [DashboardController::class, 'createBlogPartial']
                    )->name('create');


                    // Comments
                    Route::get(
                        '/comments',
                        [DashboardController::class, 'commentsPartial']
                    )->name('comments');


                    // Analytics
                    Route::get(
                        '/analytics',
                        [DashboardController::class, 'analyticsPartial']
                    )->name('analytics');
                });


            // =============================================
            // ADMIN BLOG CRUD
            // =============================================

            Route::resource(
                'blogs',
                AdminBlogController::class
            );


            // =============================================
            // ADMIN LOGOUT
            // =============================================

            Route::post(
                '/logout',
                [AdminAuthController::class, 'logout']
            )->name('logout');
        });
    });


// =====================================================
// LARAVEL AUTH ROUTES
// =====================================================

require __DIR__.'/auth.php';