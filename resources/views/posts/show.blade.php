<x-app-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6">
                <div class="row">
                    <a class="nav-link text-dark" href="/posts">
                        < Back</a>
                            @if ($post)
                                <!-- Post content-->
                                <article>
                                    <!-- Post header-->
                                    <header class="mb-4">
                                        <!-- Post title-->
                                        <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="text-muted fst-italic mb-2">
                                                Posted on {{ date('F j, Y', strtotime($post->created_at)) }} by
                                                {{ $post->user->name }}
                                            </div>
                                            <div>
                                                <div id="like-button" class="border-0 bg-transparent p-0"
                                                    data-post-id="{{ $post->id }}"
                                                    data-liked="{{ $post->is_liked ? 'true' : 'false' }}"
                                                    @auth()
                                                        onmouseover="this.style.cursor='pointer'"
                                                        onmouseout="this.style.cursor='default'"
                                                    @endauth
                                                    >
                                                    <span id="likes-count">{{ $post->likes_count }}</span>
                                                    <span class="material-icons text-primary cursor-pointer"
                                                        id="like-icon">
                                                        @if ($post->is_liked)
                                                            favorite
                                                        @else
                                                            favorite_border
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Post meta content-->
                                    </header>
                                    <!-- Preview image figure-->
                                    @php
                                        $image = $post->image ? asset('storage/images/' . $post->image) : url('images/default.jpg');
                                    @endphp
                                    <figure class="mb-4 text-center">
                                        <img class="img-fluid rounded d-block mx-auto" src="{{ $image }}"
                                            alt="..."
                                            style="max-height:500px; max-width: auto; object-fit: cover;" />
                                    </figure>
                                    <!-- Post content-->
                                    <section class="mb-5">
                                        <p class="fs-5 mb-4 text-justify!"
                                            style="text-indent: 1.5em; white-space: pre-wrap; text-align: justify;">
                                            {{ $post->content }}</p>
                                    </section>
                                </article>
                            @endif
                            @if (auth()->check() && auth()->user()->id == $post->user_id)
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="/posts/{{ $post->id }}/edit">Edit Post</a>
                                    <form method="POST" action="/posts/{{ $post->id }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete Post</button>
                                    </form>
                                </div>
                            @endif
                            <a class="nav-link text-dark mb-3" href="/posts">
                                < Back</a>
                </div>
            </div>
        </div>
    </div>
@auth
<script>
        const likeButton = document.getElementById('like-button');
        if (likeButton) {
            likeButton.addEventListener('click', function() {
                const postId = likeButton.dataset.postId;
                const isLiked = (likeButton.dataset.liked === 'true');

                if (isLiked) {
                    // Unlike the post
                    fetch(`/posts/${postId}/unlike`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                likeButton.dataset.liked = 'false';
                                document.getElementById('like-icon').innerHTML = 'favorite_border';
                                document.getElementById('likes-count').innerHTML--;
                            }
                        });
                } else {
                    // Like the post
                    fetch(`/posts/${postId}/like`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                likeButton.dataset.liked = 'true';
                                document.getElementById('like-icon').innerHTML = 'favorite';
                                document.getElementById('likes-count').innerHTML++;
                            }
                        });
                }
            });
        }
    </script>
    @endauth
</x-app-layout>
