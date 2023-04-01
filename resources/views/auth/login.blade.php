<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-7" style="width: 400px;">
                <div class="row">
                    <!-- Registration form-->
                    <div class="card mb-4">
                        <div class="card-header"><b class="font-weight-bold">LOG IN</b></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" required>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required data-validation="password">
                                         <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif

                                    <button type="submit" class="btn btn-primary">Log in</button>
                                </div>

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
