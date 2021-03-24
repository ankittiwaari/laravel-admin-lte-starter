<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            Logo Placeholder
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <div class="login-box">
            <div class="login-logo">
                Login
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to access dashboard</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <x-label class="w-100" for="email" :value="__('Email')"/>

                            <x-input id="email" class="form-control" type="email" name="email"
                                     :value="old('email')" required
                                     autofocus/>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <x-label class="w-100" for="password" :value="__('Password')"/>
                            <x-input id="password" class="form-control"
                                     type="password"
                                     name="password"
                                     required autocomplete="current-password"/>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                               name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <x-button class="btn btn-primary btn-block">
                                    Sign in
                                </x-button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mb-1">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                               href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </p>
                    <p class="mb-0">
                        @if (Route::has('register'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                               href="{{ route('register') }}">
                                Register
                            </a>
                        @endif
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
