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
                                        <!-- Post meta content-->
                                        <div class="text-muted fst-italic mb-2">Posted on
                                            {{ date('F j, Y', strtotime($post->created_at)) }} by
                                            {{ $post->user->name }}</div>
                                    </header>
                                    <!-- Preview image figure-->
                                    @php
                                        $image = $post->image ? asset('storage/images/' . $post->image) : url('storage/images/default.jpg');
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
    <script>
        const password = document.querySelector("#password");
        const confirm_password = document.querySelector("#confirm-password");
        const password_match = document.querySelector("#password-match");

        function validatePassword() {
            if (password.value !== confirm_password.value) {
                confirm_password.setCustomValidity("Passwords do not match");
                password_match.textContent = "Passwords do not match";
            } else {
                confirm_password.setCustomValidity("");
                password_match.textContent = "";
            }
        }
        password.addEventListener("change", validatePassword);
        confirm_password.addEventListener("keyup", validatePassword);
    </script>
</x-app-layout>
