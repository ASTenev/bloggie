<x-app-layout>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-7" style="width: 400px;">
                <div class="card mb-4">
                    <div class="card-header"><b class="font-weight-bold">{{ __('Forgot your password?') }}</b></div>
                    <div class="card-body">
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
