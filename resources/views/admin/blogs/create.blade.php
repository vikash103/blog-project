<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Blog</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="margin:0; font-family:Arial,sans-serif; background:#f3f4f6;">

    <div style="
        background:#111827;
        color:white;
        padding:16px 30px;
        display:flex;
        justify-content:space-between;
        align-items:center;
    ">
        <h2 style="margin:0;">Create Blog</h2>

        <a
            href="{{ route('admin.blogs.index') }}"
            style="color:white; text-decoration:none;"
        >
            Back to Blogs
        </a>
    </div>


    <div style="
        max-width:900px;
        margin:30px auto;
        background:white;
        padding:30px;
        border-radius:10px;
        box-shadow:0 2px 10px rgba(0,0,0,0.1);
    ">

        @if ($errors->any())
            <div style="
                background:#fee2e2;
                color:#dc2626;
                padding:15px;
                margin-bottom:20px;
                border-radius:5px;
            ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form
            method="POST"
            action="{{ route('admin.blogs.store') }}"
            enctype="multipart/form-data"
        >

            @csrf


            <div style="margin-bottom:20px;">
                <label>Category</label>

                <select
                    name="category_id"
                    required
                    style="
                        width:100%;
                        padding:10px;
                        margin-top:5px;
                    "
                >
                    <option value="">Select Category</option>

                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div style="margin-bottom:20px;">
                <label>Title</label>

                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    required
                    style="
                        width:100%;
                        padding:10px;
                        box-sizing:border-box;
                    "
                >
            </div>


            <div style="margin-bottom:20px;">

                <label>
                    <input
                        type="checkbox"
                        id="customSlugToggle"
                    >
                    Enter Custom URL
                </label>

                <input
                    type="text"
                    name="slug"
                    id="slug"
                    value="{{ old('slug') }}"
                    placeholder="Auto generated from title"
                    disabled
                    style="
                        width:100%;
                        padding:10px;
                        margin-top:10px;
                        box-sizing:border-box;
                    "
                >

            </div>


            <div style="margin-bottom:20px;">
                <label>Description</label>

                <textarea
                    name="description"
                    rows="4"
                    style="
                        width:100%;
                        padding:10px;
                        box-sizing:border-box;
                    "
                >{{ old('description') }}</textarea>
            </div>


            <div style="margin-bottom:20px;">
                <label>Blog Content</label>

                <textarea
                    name="content"
                    rows="12"
                    style="
                        width:100%;
                        padding:10px;
                        box-sizing:border-box;
                    "
                >{{ old('content') }}</textarea>
            </div>


            <div style="margin-bottom:20px;">
                <label>Thumbnail Image</label>

                <input
                    type="file"
                    name="thumbnail"
                    accept="image/*"
                    style="display:block; margin-top:8px;"
                >
            </div>


            <div style="margin-bottom:20px;">
                <label>Banner Image</label>

                <input
                    type="file"
                    name="banner"
                    accept="image/*"
                    style="display:block; margin-top:8px;"
                >
            </div>


            <div style="margin-bottom:20px;">
                <label>SEO Title</label>

                <input
                    type="text"
                    name="seo_title"
                    value="{{ old('seo_title') }}"
                    style="
                        width:100%;
                        padding:10px;
                        box-sizing:border-box;
                    "
                >
            </div>


            <div style="margin-bottom:20px;">
                <label>SEO Description</label>

                <textarea
                    name="seo_description"
                    rows="3"
                    style="
                        width:100%;
                        padding:10px;
                        box-sizing:border-box;
                    "
                >{{ old('seo_description') }}</textarea>
            </div>


            <div style="margin-bottom:20px;">
                <label>Canonical Tag</label>

                <input
                    type="text"
                    name="canonical_tag"
                    value="{{ old('canonical_tag') }}"
                    style="
                        width:100%;
                        padding:10px;
                        box-sizing:border-box;
                    "
                >
            </div>


            <div style="margin-bottom:20px;">
                <label>Schema Markup</label>

                <textarea
                    name="schema_markup"
                    rows="5"
                    style="
                        width:100%;
                        padding:10px;
                        box-sizing:border-box;
                    "
                >{{ old('schema_markup') }}</textarea>
            </div>


            <div style="margin-bottom:20px;">
                <label>Tags</label>

                <select
                    name="tags[]"
                    multiple
                    style="
                        width:100%;
                        min-height:120px;
                        padding:10px;
                        margin-top:5px;
                    "
                >
                    @foreach ($tags as $tag)
                        <option
                            value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}
                        >
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>

                <small>
                    Ctrl press karke multiple tags select kar sakte ho.
                </small>
            </div>


            <button
                type="submit"
                style="
                    width:100%;
                    background:#111827;
                    color:white;
                    padding:13px;
                    border:none;
                    border-radius:5px;
                    cursor:pointer;
                    font-size:16px;
                "
            >
                Create Blog
            </button>

        </form>

    </div>


    <script>
        const toggle = document.getElementById('customSlugToggle');
        const slugInput = document.getElementById('slug');

        toggle.addEventListener('change', function () {
            slugInput.disabled = !this.checked;

            if (!this.checked) {
                slugInput.value = '';
            }
        });
    </script>

</body>
</html>