<x-app-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-7" style="width: 400px;">
                <div class="row">
                    <!-- Password confirmation form-->
                    <div class="card mb-4">
                        <div class="card-header"><b class="font-weight-bold">{{ __('Confirm Password') }}</b></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required autocomplete="current-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="flex justify-end mt-4">
                                    <button type="submit" class="btn btn-primary">{{ __('Confirm') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
