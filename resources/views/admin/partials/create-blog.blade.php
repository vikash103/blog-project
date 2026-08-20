<div>

    <div style="margin-bottom:25px;">

        <h1 style="margin:0 0 6px; font-size:28px;">
            Create Blog
        </h1>

        <p style="margin:0; color:#6b7280;">
            Create and publish a new blog post.
        </p>

    </div>


    <form
        method="POST"
        action="{{ route('admin.blogs.store') }}"
        enctype="multipart/form-data"
        id="createBlogForm"
    >

        @csrf


        {{-- Category --}}

        <div style="margin-bottom:18px;">

            <label style="display:block; margin-bottom:7px;">
                Category
            </label>

            <select
                name="category_id"
                required
                style="
                    width:100%;
                    padding:11px;
                    border:1px solid #d1d5db;
                    border-radius:7px;
                "
            >

                <option value="">
                    Select Category
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

        </div>


        {{-- Title --}}

        <div style="margin-bottom:18px;">

            <label style="display:block; margin-bottom:7px;">
                Title
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                required
                style="
                    width:100%;
                    padding:11px;
                    border:1px solid #d1d5db;
                    border-radius:7px;
                    box-sizing:border-box;
                "
            >

        </div>


        {{-- Slug --}}

        <div style="margin-bottom:18px;">

            <label style="display:block; margin-bottom:7px;">
                Custom Slug
            </label>

            <input
                type="text"
                name="slug"
                value="{{ old('slug') }}"
                placeholder="Leave empty for automatic slug"
                style="
                    width:100%;
                    padding:11px;
                    border:1px solid #d1d5db;
                    border-radius:7px;
                    box-sizing:border-box;
                "
            >

        </div>


        {{-- Description --}}

        <div style="margin-bottom:18px;">

            <label style="display:block; margin-bottom:7px;">
                Description
            </label>

            <textarea
                name="description"
                rows="4"
                style="
                    width:100%;
                    padding:11px;
                    border:1px solid #d1d5db;
                    border-radius:7px;
                    box-sizing:border-box;
                "
            >{{ old('description') }}</textarea>

        </div>


        {{-- Content --}}

        <div style="margin-bottom:18px;">

            <label style="display:block; margin-bottom:7px;">
                Blog Content
            </label>

            <textarea
                name="content"
                rows="10"
                style="
                    width:100%;
                    padding:11px;
                    border:1px solid #d1d5db;
                    border-radius:7px;
                    box-sizing:border-box;
                "
            >{{ old('content') }}</textarea>

        </div>


        {{-- Thumbnail --}}

        <div style="margin-bottom:18px;">

            <label style="display:block; margin-bottom:7px;">
                Thumbnail
            </label>

            <input
                type="file"
                name="thumbnail"
                accept="image/*"
            >

        </div>


        {{-- Banner --}}

        <div style="margin-bottom:18px;">

            <label style="display:block; margin-bottom:7px;">
                Banner
            </label>

            <input
                type="file"
                name="banner"
                accept="image/*"
            >

        </div>


        {{-- SEO Title --}}

        <div style="margin-bottom:18px;">

            <label style="display:block; margin-bottom:7px;">
                SEO Title
            </label>

            <input
                type="text"
                name="seo_title"
                value="{{ old('seo_title') }}"
                style="
                    width:100%;
                    padding:11px;
                    border:1px solid #d1d5db;
                    border-radius:7px;
                    box-sizing:border-box;
                "
            >

        </div>


        {{-- SEO Description --}}

        <div style="margin-bottom:18px;">

            <label style="display:block; margin-bottom:7px;">
                SEO Description
            </label>

            <textarea
                name="seo_description"
                rows="3"
                style="
                    width:100%;
                    padding:11px;
                    border:1px solid #d1d5db;
                    border-radius:7px;
                    box-sizing:border-box;
                "
            >{{ old('seo_description') }}</textarea>

        </div>


        {{-- Canonical Tag --}}

        <div style="margin-bottom:18px;">

            <label style="display:block; margin-bottom:7px;">
                Canonical Tag
            </label>

            <input
                type="text"
                name="canonical_tag"
                value="{{ old('canonical_tag') }}"
                style="
                    width:100%;
                    padding:11px;
                    border:1px solid #d1d5db;
                    border-radius:7px;
                    box-sizing:border-box;
                "
            >

        </div>


        {{-- Schema Markup --}}

        <div style="margin-bottom:18px;">

            <label style="display:block; margin-bottom:7px;">
                Schema Markup
            </label>

            <textarea
                name="schema_markup"
                rows="5"
                style="
                    width:100%;
                    padding:11px;
                    border:1px solid #d1d5db;
                    border-radius:7px;
                    box-sizing:border-box;
                "
            >{{ old('schema_markup') }}</textarea>

        </div>


        {{-- Tags --}}

        <div style="margin-bottom:20px;">

            <label style="display:block; margin-bottom:7px;">
                Tags
            </label>

            <select
                name="tags[]"
                multiple
                style="
                    width:100%;
                    min-height:120px;
                    padding:10px;
                    border:1px solid #d1d5db;
                    border-radius:7px;
                "
            >

                @foreach($tags as $tag)

                    <option
                        value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}
                    >
                        {{ $tag->name }}
                    </option>

                @endforeach

            </select>

            <small style="color:#6b7280;">
                Ctrl press karke multiple tags select karein.
            </small>

        </div>


        <button
            type="submit"
            style="
                background:#2563eb;
                color:white;
                border:none;
                border-radius:8px;
                padding:12px 24px;
                cursor:pointer;
                font-weight:600;
            "
        >
            Create Blog
        </button>

    </form>

</div>