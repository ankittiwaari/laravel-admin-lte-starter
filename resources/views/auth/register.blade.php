<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <div class="login-box">
            <div class="login-logo">
                Register
            </div>
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register a new membership</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <x-label for="name" class="w-100" :value="__('Name')"/>

                            <x-input id="name" class="form-control" placeholder="Full name" type="text" name="name"
                                     :value="old('name')"
                                     required
                                     autofocus/>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <x-label for="email" class="w-100" :value="__('Email')"/>

                            <x-input id="email" class="form-control" placeholder="Email" type="email" name="email"
                                     :value="old('email')"
                                     required/>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <x-label for="password" class="w-100" :value="__('Password')"/>

                            <x-input id="password" class="form-control" placeholder="Password"
                                     type="password"
                                     name="password"
                                     required autocomplete="new-password"/>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <x-label class="w-100" for="password_confirmation" :value="__('Confirm Password')"/>

                            <x-input id="password_confirmation" class="form-control" placeholder="Retype password"
                                     type="password"
                                     name="password_confirmation" required/>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <x-button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                            <div class="col-12">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                   href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    </x-auth-card>
</x-guest-layout>
