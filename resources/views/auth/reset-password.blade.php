<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-7" style="width: 400px;">
                <div class="row">
                    <!-- Password reset form-->
                    <div class="card mb-4">
                        <div class="card-header"><b class="font-weight-bold">RESET PASSWORD</b></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $request->email) }}" required
                                        autofocus autocomplete="username">
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
                                        id="password" name="password" required autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation" required
                                        autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <x-primary-button>
                                        {{ __('Reset Password') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
