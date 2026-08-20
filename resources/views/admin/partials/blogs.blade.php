<div>

    <!-- ==========================================
         HEADER
    =========================================== -->

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:15px;
        margin-bottom:25px;
    ">

        <div>

            <h1 style="
                margin:0 0 6px;
                font-size:28px;
                color:#111827;
            ">
                Manage Blogs
            </h1>

            <p style="
                margin:0;
                color:#6b7280;
                font-size:14px;
            ">
                View and manage all published blogs.
            </p>

        </div>


        <!-- CREATE BLOG BUTTON -->

        <button
            type="button"
            class="ajax-action"
            data-url="{{ route('admin.panel.create') }}"
            data-menu-target="create"
            style="
                background:#2563eb;
                color:white;
                border:none;
                padding:10px 18px;
                border-radius:8px;
                cursor:pointer;
                font-weight:600;
                font-size:14px;
            "
        >
            + Create Blog
        </button>

    </div>


    <!-- ==========================================
         BLOG TABLE
    =========================================== -->

    <div style="
        background:white;
        border:1px solid #e5e7eb;
        border-radius:12px;
        overflow-x:auto;
    ">

        <table style="
            width:100%;
            border-collapse:collapse;
            min-width:850px;
        ">

            <!-- TABLE HEAD -->

            <thead>

                <tr style="
                    background:#f9fafb;
                    border-bottom:1px solid #e5e7eb;
                ">

                    <th style="
                        padding:14px;
                        text-align:left;
                        font-size:13px;
                        color:#374151;
                    ">
                        Sr. No.
                    </th>

                    <th style="
                        padding:14px;
                        text-align:left;
                        font-size:13px;
                        color:#374151;
                    ">
                        Title
                    </th>

                    <th style="
                        padding:14px;
                        text-align:left;
                        font-size:13px;
                        color:#374151;
                    ">
                        Category
                    </th>

                    <th style="
                        padding:14px;
                        text-align:left;
                        font-size:13px;
                        color:#374151;
                    ">
                        Views
                    </th>

                    <th style="
                        padding:14px;
                        text-align:left;
                        font-size:13px;
                        color:#374151;
                    ">
                        Date
                    </th>

                    <th style="
                        padding:14px;
                        text-align:left;
                        font-size:13px;
                        color:#374151;
                    ">
                        Action
                    </th>

                </tr>

            </thead>


            <!-- TABLE BODY -->

            <tbody>

                @forelse($blogs as $blog)

                    <tr style="
                        border-top:1px solid #e5e7eb;
                    ">

                        <!-- ==========================
                             SERIAL NUMBER
                        =========================== -->

                        <td style="
                            padding:14px;
                            font-size:14px;
                            color:#374151;
                        ">

                            {{ $blogs->firstItem() + $loop->index }}

                        </td>


                        <!-- ==========================
                             TITLE
                        =========================== -->

                        <td style="
                            padding:14px;
                            font-size:14px;
                        ">

                            <strong style="
                                color:#111827;
                                font-weight:600;
                            ">
                                {{ $blog->title }}
                            </strong>

                        </td>


                        <!-- ==========================
                             CATEGORY
                        =========================== -->

                        <td style="
                            padding:14px;
                            font-size:14px;
                            color:#374151;
                        ">

                            {{ $blog->category?->name ?? 'N/A' }}

                        </td>


                        <!-- ==========================
                             VIEWS
                        =========================== -->

                        <td style="
                            padding:14px;
                            font-size:14px;
                            color:#374151;
                        ">

                            {{ number_format($blog->views ?? 0) }}

                        </td>


                        <!-- ==========================
                             DATE
                        =========================== -->

                        <td style="
                            padding:14px;
                            font-size:14px;
                            color:#374151;
                            white-space:nowrap;
                        ">

                            {{ $blog->created_at->format('d M Y') }}

                        </td>


                        <!-- ==========================
                             ACTIONS
                        =========================== -->

                        <td style="
                            padding:14px;
                            white-space:nowrap;
                        ">

                            <!-- EDIT -->

                            <a
                                href="{{ route('admin.blogs.edit', $blog) }}"
                                style="
                                    color:#2563eb;
                                    text-decoration:none;
                                    margin-right:14px;
                                    font-size:14px;
                                    font-weight:500;
                                "
                            >
                                Edit
                            </a>


                            <!-- DELETE -->

                            <form
                                action="{{ route('admin.blogs.destroy', $blog) }}"
                                method="POST"
                                class="ajax-delete-blog"
                                style="display:inline;"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    style="
                                        border:none;
                                        background:none;
                                        color:#dc2626;
                                        cursor:pointer;
                                        padding:0;
                                        font-size:14px;
                                        font-weight:500;
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
                                padding:35px;
                                text-align:center;
                                color:#6b7280;
                                font-size:14px;
                            "
                        >
                            No blogs found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <!-- ==========================================
         PAGINATION
    =========================================== -->

    @if($blogs->hasPages())

        <div style="
            margin-top:20px;
        ">

            {{ $blogs->links() }}

        </div>

    @endif

</div>