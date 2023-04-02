<x-app-layout>
    <form method="POST" action="{{ route('register') }}">
        <!-- Page content -->
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-7" style="width: 400px;">
                    <div class="row">
                        <!-- Registration form -->
                        <div class="card mb-4">
                            <div class="card-header"><b class="font-weight-bold">REGISTER FOR FREE</b></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" required>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" required>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            name="password" required data-validation="password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password"
                                            class="form-control @error('confirm_password') is-invalid @enderror"
                                            id="password_confirmation" name="password_confirmation" required
                                            data-validation="confirmation" data-validation-confirm="password">
                                        <div class="invalid-feedback">Passwords do not match.</div>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox"
                                            class="form-check-input @error('terms') is-invalid @enderror" id="terms"
                                            name="terms" required>
                                        <label class="form-check-label" for="terms">I agree to the <a
                                                href="#">terms and conditions</a>.</label>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>
                                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
            <script>
                const password = document.querySelector("#password");
                const confirm_password = document.querySelector("#password_confirmation");
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
        @endpush

</x-app-layout>
