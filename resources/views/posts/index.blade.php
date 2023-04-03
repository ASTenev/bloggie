<x-app-layout>
    <!-- Page header with logo and tagline-->
    <div id="flash-message"></div>
    @if (session('success'))
        <script>
            setTimeout(function() {
                var message = "{{ session('success') }}";
                var flashMessage = document.getElementById('flash-message');
                flashMessage.innerHTML = message;
                flashMessage.classList.add('alert', 'text-white', 'position-fixed', 'top-0', 'start-50',
                    'translate-middle-x', 'p-3', 'rounded');
                setTimeout(function() {
                    flashMessage.parentNode.removeChild(flashMessage);
                }, 2000);
            }, 100);
        </script>
    @endif

    <header class="bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Bloggie!</h1>
                <p class="lead mb-0">Explore, inspire, and share your passion with the world.</p>
            </div>
        </div>
    </header>
    <!-- Page content-->

    <div class="container-fluid mb-5">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="row">
                    @include('posts.categoryFilter')

                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-7">
                <div class="row">
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <div class="col-md-6 mx-auto mb-4" style="width: 400px;">
                                <div class="card" style="min-height:100%;"">
                                    <a href="/posts/{{ $post->id }}">
                                        @if ($post->image)
                                            @php $image = url('storage/' . $post->image) @endphp
                                        @else
                                            @php $image = url('images/default.jpg') @endphp
                                        @endif
                                        <div class="image-container" style="width: auto;">
                                            <img src="{{ $image }}" alt="Post image" class="mx-auto d-block"
                                                style="max-height: 300px; max-width: 100%; object-fit: cover;">
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="text-muted fst-italic mb-2">
                                                Posted on {{ date('F j, Y', strtotime($post->created_at)) }} by
                                                {{ $post->user->name }}
                                            </div>
                                            <div>
                                                <div id="like-button-{{ $post->id }}"
                                                    class="border-0 bg-transparent p-0 d-flex"
                                                    data-post-id="{{ $post->id }}"
                                                    data-liked="{{ $post->is_liked ? 'true' : 'false' }}">
                                                    <span id="likes-count-{{ $post->id }}"
                                                        class="mr-2">{{ $post->likes_count }}</span>
                                                    <span class="material-icons text-primary cursor-pointer"
                                                        id="like-icon-{{ $post->id }}">
                                                        @if ($post->is_liked)
                                                            favorite
                                                        @else
                                                            favorite_border
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="card-title h4">{{ $post->title }}</h2>
                                        <p class="card-text" style="text-indent: 1.5em; text-align: justify;">
                                            {{ Str::limit($post->content, 100) }} ...</p>
                                        <a class="btn btn-primary" href="/posts/{{ $post->id }}">Read more →</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-center">
                            {{ $posts->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    @else
                        <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                            <h3 class="text-center" style="width: 100%;">NO POSTS</h3>
                        </div>
                    @endif
                    @auth
                        <a class="btn btn-primary mt-5 mb-5" href="/posts/create">Create Post</a>
                    @endauth
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
