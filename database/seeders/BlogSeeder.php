<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | DELETE OLD BLOG TEST DATA
        |--------------------------------------------------------------------------
        */

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('blog_tag')->truncate();
        DB::table('blog_views')->truncate();
        DB::table('likes')->truncate();
        DB::table('comments')->truncate();
        DB::table('blogs')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        /*
        |--------------------------------------------------------------------------
        | DELETE OLD SEEDED IMAGES ONLY
        |--------------------------------------------------------------------------
        |
        | Ye manually uploaded admin images ko delete nahi karega.
        | Sirf BlogSeeder se generate hui images delete hongi.
        |
        */

        Storage::disk('public')
            ->deleteDirectory('blogs/seeded');


        /*
        |--------------------------------------------------------------------------
        | CREATE IMAGE DIRECTORIES
        |--------------------------------------------------------------------------
        */

        Storage::disk('public')
            ->makeDirectory('blogs/seeded/thumbnails');

        Storage::disk('public')
            ->makeDirectory('blogs/seeded/banners');


        /*
        |--------------------------------------------------------------------------
        | CATEGORIES
        |--------------------------------------------------------------------------
        */

        $technology = Category::firstOrCreate(
            [
                'slug' => 'technology',
            ],
            [
                'name' => 'Technology',
            ]
        );

        $development = Category::firstOrCreate(
            [
                'slug' => 'web-development',
            ],
            [
                'name' => 'Web Development',
            ]
        );

        $database = Category::firstOrCreate(
            [
                'slug' => 'database',
            ],
            [
                'name' => 'Database',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | TAGS
        |--------------------------------------------------------------------------
        */

        $tagData = [
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
            ],
            [
                'name' => 'PHP',
                'slug' => 'php',
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
            ],
            [
                'name' => 'MySQL',
                'slug' => 'mysql',
            ],
            [
                'name' => 'Backend',
                'slug' => 'backend',
            ],
        ];

        foreach ($tagData as $tag) {

            Tag::firstOrCreate(
                [
                    'slug' => $tag['slug'],
                ],
                [
                    'name' => $tag['name'],
                ]
            );
        }

        $tags = Tag::all();


        /*
        |--------------------------------------------------------------------------
        | BLOG DATA
        |--------------------------------------------------------------------------
        */

        $blogs = [

            [
                'title' => 'Getting Started with Laravel',
                'category' => $development,
            ],

            [
                'title' => 'Laravel Routing Explained',
                'category' => $development,
            ],

            [
                'title' => 'Understanding Laravel Controllers',
                'category' => $development,
            ],

            [
                'title' => 'Laravel Blade Template Guide',
                'category' => $development,
            ],

            [
                'title' => 'Laravel Eloquent ORM Tutorial',
                'category' => $development,
            ],

            [
                'title' => 'Building Authentication in Laravel',
                'category' => $development,
            ],

            [
                'title' => 'Laravel Middleware Explained',
                'category' => $development,
            ],

            [
                'title' => 'Laravel Validation Best Practices',
                'category' => $development,
            ],

            [
                'title' => 'Working with Laravel Migrations',
                'category' => $database,
            ],

            [
                'title' => 'Laravel Relationships Explained',
                'category' => $database,
            ],

            [
                'title' => 'PHP Basics for Beginners',
                'category' => $development,
            ],

            [
                'title' => 'Object Oriented Programming in PHP',
                'category' => $development,
            ],

            [
                'title' => 'PHP Arrays Complete Guide',
                'category' => $development,
            ],

            [
                'title' => 'Understanding PHP Functions',
                'category' => $development,
            ],

            [
                'title' => 'PHP Error Handling Best Practices',
                'category' => $development,
            ],

            [
                'title' => 'Modern Web Development Guide',
                'category' => $technology,
            ],

            [
                'title' => 'Frontend vs Backend Development',
                'category' => $technology,
            ],

            [
                'title' => 'How REST APIs Work',
                'category' => $development,
            ],

            [
                'title' => 'Understanding MVC Architecture',
                'category' => $development,
            ],

            [
                'title' => 'Database Design Best Practices',
                'category' => $database,
            ],

            [
                'title' => 'Introduction to MySQL',
                'category' => $database,
            ],

            [
                'title' => 'MySQL Joins Explained',
                'category' => $database,
            ],

            [
                'title' => 'How to Optimize SQL Queries',
                'category' => $database,
            ],

            [
                'title' => 'Git and GitHub for Developers',
                'category' => $technology,
            ],

            [
                'title' => 'How to Become a Full Stack Developer',
                'category' => $technology,
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | CREATE BLOGS
        |--------------------------------------------------------------------------
        */

        foreach ($blogs as $index => $item) {

            $title = $item['title'];

            $slug = Str::slug($title);


            /*
            |--------------------------------------------------------------------------
            | DOWNLOAD THUMBNAIL
            |--------------------------------------------------------------------------
            */

            $thumbnailPath = $this->downloadImage(
                'https://picsum.photos/seed/' .
                $slug .
                '-thumbnail/800/500',

                'blogs/seeded/thumbnails/' .
                $slug .
                '.jpg'
            );


            /*
            |--------------------------------------------------------------------------
            | DOWNLOAD BANNER
            |--------------------------------------------------------------------------
            */

            $bannerPath = $this->downloadImage(
                'https://picsum.photos/seed/' .
                $slug .
                '-banner/1400/700',

                'blogs/seeded/banners/' .
                $slug .
                '.jpg'
            );


            /*
            |--------------------------------------------------------------------------
            | CREATE BLOG
            |--------------------------------------------------------------------------
            */

            $blog = Blog::create([

                'admin_id' => 1,

                'category_id' => $item['category']->id,

                'title' => $title,

                'slug' => $slug,


                /*
                |--------------------------------------------------------------------------
                | DESCRIPTION
                |--------------------------------------------------------------------------
                */

                'description' =>
                    'A practical and beginner-friendly guide to ' .
                    $title .
                    '. Learn important concepts with examples and best practices.',


                /*
                |--------------------------------------------------------------------------
                | BLOG CONTENT
                |--------------------------------------------------------------------------
                */

                'content' => '

                    <h2>Introduction</h2>

                    <p>
                        Welcome to this complete guide on ' . $title . '.
                        In this article we will understand the main concepts
                        in a simple and practical way.
                    </p>


                    <h2>Why This Topic Matters</h2>

                    <p>
                        Understanding this topic can help developers build
                        cleaner, faster and more maintainable applications.
                    </p>


                    <h2>Main Concepts</h2>

                    <p>
                        We will cover important fundamentals, common
                        development patterns and useful implementation ideas.
                    </p>


                    <h3>Practical Example</h3>

                    <p>
                        This section represents realistic article content
                        used for testing the BlogSpace application.
                    </p>


                    <h2>Best Practices</h2>

                    <p>
                        Always follow clean coding standards, validation,
                        security practices and proper project organization.
                    </p>


                    <h2>Conclusion</h2>

                    <p>
                        This guide gives you a strong introduction to
                        ' . $title . ' and can be used as a foundation
                        for further learning.
                    </p>
                ',


                /*
                |--------------------------------------------------------------------------
                | REAL IMAGE PATHS
                |--------------------------------------------------------------------------
                */

                'thumbnail' => $thumbnailPath,

                'banner' => $bannerPath,


                /*
                |--------------------------------------------------------------------------
                | SEO
                |--------------------------------------------------------------------------
                */

                'seo_title' =>
                    $title . ' | BlogSpace',

                'seo_description' =>
                    'Learn ' .
                    $title .
                    ' with practical examples, explanations and best practices.',

                'canonical_tag' =>
                    'http://127.0.0.1:8000/blogs/' .
                    $slug,


                /*
                |--------------------------------------------------------------------------
                | SCHEMA MARKUP
                |--------------------------------------------------------------------------
                */

                'schema_markup' => json_encode(
                    [
                        '@context' => 'https://schema.org',

                        '@type' => 'Article',

                        'headline' => $title,

                        'author' => [
                            '@type' => 'Person',
                            'name' => 'Admin',
                        ],
                    ],
                    JSON_UNESCAPED_SLASHES
                ),


                /*
                |--------------------------------------------------------------------------
                | TESTING VIEWS
                |--------------------------------------------------------------------------
                */

                'views' => rand(10, 300),


                /*
                |--------------------------------------------------------------------------
                | DATES
                |--------------------------------------------------------------------------
                */

                'created_at' =>
                    now()->subDays(25 - $index),

                'updated_at' =>
                    now(),
            ]);


            /*
            |--------------------------------------------------------------------------
            | ATTACH RANDOM TAGS
            |--------------------------------------------------------------------------
            */

            $selectedTags = $tags
                ->random(
                    rand(
                        1,
                        min(3, $tags->count())
                    )
                )
                ->pluck('id')
                ->toArray();


            $blog->tags()->sync($selectedTags);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | DOWNLOAD IMAGE METHOD
    |--------------------------------------------------------------------------
    */

    private function downloadImage(
        string $url,
        string $path
    ): ?string {

        try {

            $response = Http::withOptions([
                    'allow_redirects' => true,

                    // Local Windows development ke liye.
                    // Production me verify false remove kar dena.
                    'verify' => false,
                ])
                ->timeout(30)
                ->retry(2, 500)
                ->get($url);


            if (!$response->successful()) {

                $this->command?->warn(
                    'Image download failed: ' . $url
                );

                return null;
            }


            Storage::disk('public')->put(
                $path,
                $response->body()
            );


            $this->command?->info(
                'Image saved: ' . $path
            );


            return $path;

        } catch (\Throwable $e) {

            $this->command?->warn(
                'Image error: ' . $e->getMessage()
            );

            return null;
        }
    }
}