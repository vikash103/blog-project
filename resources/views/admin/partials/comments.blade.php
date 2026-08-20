<div>

    <div style="margin-bottom:25px;">

        <h1 style="margin:0 0 6px; font-size:28px;">
            Comments
        </h1>

        <p style="margin:0; color:#6b7280;">
            View comments posted by users.
        </p>

    </div>


    <div style="
        background:white;
        border:1px solid #e5e7eb;
        border-radius:12px;
        overflow-x:auto;
    ">

        <table style="
            width:100%;
            border-collapse:collapse;
        ">

            <thead>

                <tr style="background:#f9fafb;">

                    <th style="padding:14px; text-align:left;">
                        User
                    </th>

                    <th style="padding:14px; text-align:left;">
                        Blog
                    </th>

                    <th style="padding:14px; text-align:left;">
                        Comment
                    </th>

                    <th style="padding:14px; text-align:left;">
                        Date
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($comments as $comment)

                    <tr style="border-top:1px solid #e5e7eb;">

                        <td style="padding:14px;">
                            {{ $comment->user?->name ?? 'Unknown User' }}
                        </td>

                        <td style="padding:14px;">
                            {{ $comment->blog?->title ?? 'Blog Deleted' }}
                        </td>

                        <td style="padding:14px;">
                            {{ Str::limit($comment->body, 80) }}
                        </td>

                        <td style="padding:14px;">
                            {{ $comment->created_at->format('d M Y') }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="4"
                            style="
                                padding:30px;
                                text-align:center;
                                color:#6b7280;
                            "
                        >
                            No comments found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    @if($comments->hasPages())

        <div style="margin-top:20px;">
            {{ $comments->links() }}
        </div>

    @endif

</div>