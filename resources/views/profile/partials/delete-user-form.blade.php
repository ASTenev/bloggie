<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-7">
            <div class="row">
                <!-- Delete Account form -->
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header"><b class="font-weight-bold">
                                {{ __('Delete Account') }}
                            </b></div>
                        <div class="card-body">
                            <p class="text-sm text-gray-600">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                            </p>

                            <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900">
                                    {{ __('Are you sure you want to delete your account?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>

                                <div class="mt-6">
                                    <label for="password" class="form-label sr-only">{{ __('Password') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="{{ __('Password') }}" required>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mt-6">
                                    <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                                    <a href="#" class="btn btn-secondary">{{ __('Cancel') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
