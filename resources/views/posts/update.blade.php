<x-app-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-7">
                <div class="row">
                    <!-- Create Post form-->
                    <div class="card mb-4">
                        <div class="card-header"><b class="font-weight-bold">
                                EDIT POST
                            </b></div>
                        <div class="card-body">
                            <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required
                                        value="{{ $post->title }}">
                                    <div class="invalid-feedback">
                                        Please enter your title.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea class="form-control" id="content" name="content" rows=13 required>{{ $post->content }}</textarea>
                                    <div class="invalid-feedback">
                                        Please enter a valid content.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    @if ($post->image)
                                        <img src="{{ url('storage/' . $post->image) }}" alt="Current image"
                                            style="width:200px;height:200px">
                                        <input type='hidden' name="old_image" value="{{ $post->image }}">
                                    @endif
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>

                        </div>
                    </div>
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
