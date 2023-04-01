<x-app-layout>
<!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to My Blog!</h1>
                <p class="lead mb-0">Explore, inspire, and share your passion with the world.</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-7">
                <div class="row">
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <div class="col-md-6 mx-auto" style="width: 400px;">
                            <div class="card mb-4">
                                <a href="/posts/{{ $post->id }}">
                                    @if($post->image)
                                        @php $image = url('/images/posts/' . $post->image) @endphp
                                    @else
                                        @php $image = "https://dummyimage.com/900x400/ced4da/6c757d.jpg" @endphp
                                    @endif
                                    <div class="image-container" style="width: auto;">
                                        <img src="{{ $image }}" alt="Post image" style="width: 100%;">
                                    </div>
                                </a>
                                <div class="card-body">
                                    <div class="small text-muted">Posted on {{ $post->created_at->format('F j, Y') }} by {{ $post->user->name }}</div>
                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    <p class="card-text" style="text-indent: 1.5em; text-align: justify;">{{ Str::limit($post->content, 100) }} ...</p>
                                    <a class="btn btn-primary" href="/posts/{{ $post->id }}">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
