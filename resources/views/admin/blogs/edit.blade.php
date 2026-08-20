<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #111827;
        }

        .topbar {
            background: #111827;
            color: white;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar a {
            color: white;
            text-decoration: none;
        }

        .container {
            width: 94%;
            max-width: 1000px;
            margin: 30px auto;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 7px;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .current-image {
            width: 160px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
            display: block;
        }

        .footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .cancel {
            text-decoration: none;
            padding: 11px 18px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            color: #374151;
        }

        .update {
            background: #16a34a;
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="topbar">
    <h2>Edit Blog</h2>

    <a href="{{ route('admin.blogs.index') }}">
        ← Back to Blogs
    </a>
</div>

<div class="container">

    @if ($errors->any())
        <div class="card" style="background:#fee2e2; color:#991b1b;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('admin.blogs.update', $blog) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="card">

            <h3>Basic Information</h3>

            <div class="grid">

                <div class="form-group">
                    <label>Category</label>

                    <select name="category_id" required>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Title</label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $blog->title) }}"
                        required
                    >
                </div>

            </div>

            <div class="form-group">
                <label>Slug</label>

                <input
                    type="text"
                    name="slug"
                    value="{{ old('slug', $blog->slug) }}"
                >
            </div>

            <div class="form-group">
                <label>Description</label>

                <textarea
                    name="description"
                    rows="4"
                >{{ old('description', $blog->description) }}</textarea>
            </div>

        </div>


        <div class="card">

            <h3>Blog Content</h3>

            <div class="form-group">
                <textarea
                    name="content"
                    rows="15"
                >{{ old('content', $blog->content) }}</textarea>
            </div>

        </div>


        <div class="card">

            <h3>Images</h3>

            <div class="grid">

                <div class="form-group">
                    <label>Thumbnail</label>

                    @if($blog->thumbnail)
                        <img
                            src="{{ asset('storage/' . $blog->thumbnail) }}"
                            class="current-image"
                        >
                    @endif

                    <input
                        type="file"
                        name="thumbnail"
                        accept="image/*"
                    >
                </div>


                <div class="form-group">
                    <label>Banner</label>

                    @if($blog->banner)
                        <img
                            src="{{ asset('storage/' . $blog->banner) }}"
                            class="current-image"
                        >
                    @endif

                    <input
                        type="file"
                        name="banner"
                        accept="image/*"
                    >
                </div>

            </div>

        </div>


        <div class="card">

            <h3>SEO</h3>

            <div class="form-group">
                <label>SEO Title</label>

                <input
                    type="text"
                    name="seo_title"
                    value="{{ old('seo_title', $blog->seo_title) }}"
                >
            </div>

            <div class="form-group">
                <label>SEO Description</label>

                <textarea
                    name="seo_description"
                    rows="3"
                >{{ old('seo_description', $blog->seo_description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Canonical URL</label>

                <input
                    type="text"
                    name="canonical_tag"
                    value="{{ old('canonical_tag', $blog->canonical_tag) }}"
                >
            </div>

            <div class="form-group">
                <label>Schema Markup</label>

                <textarea
                    name="schema_markup"
                    rows="5"
                >{{ old('schema_markup', $blog->schema_markup) }}</textarea>
            </div>

        </div>


        <div class="card">

            <h3>Tags</h3>

            <select
                name="tags[]"
                multiple
                style="width:100%; min-height:130px;"
            >
                @foreach($tags as $tag)
                    <option
                        value="{{ $tag->id }}"
                        {{ in_array(
                            $tag->id,
                            old('tags', $blog->tags->pluck('id')->toArray())
                        ) ? 'selected' : '' }}
                    >
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>

        </div>


        <div class="card footer">

            <a
                href="{{ route('admin.blogs.index') }}"
                class="cancel"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="update"
            >
                Update Blog
            </button>

        </div>

    </form>

</div>

</body>
</html>