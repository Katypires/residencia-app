@extends('layouts.app')

@section('content')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Login Residência Médica e Multiprofissional</h1>
                <p class="col-lg-10 fs-4">Acesse sua conta para continuar. Insira seu CPF e senha para realizar o login.</p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form method="POST" action="{{ route('login') }}" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                    @csrf
                    <div class="form-floating mb-3">
                        <input id="login" type="text" class="form-control @error('login') is-invalid @enderror"
                            name="login" value="{{ old('login') }}" required autofocus placeholder="Digite seu CPF">
                        <label for="login">{{ __('CPF') }}</label>
                        @error('login')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required placeholder="Password">
                        <label for="password">{{ __('Senha') }}</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            {{ __('Lembrar de mim') }}
                        </label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Login') }}</button>

                    @if (Route::has('password.request'))
                        <a class="w-100 btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha ?') }}
                        </a>
                    @endif

                    <hr class="my-4">

                    <p class="text-center">Não tem uma conta?</p>
                    <a class="w-100 btn btn-lg btn-outline-primary" href="{{ route('register') }}">Registrar-se</a>

                    <small class="text-body-secondary">Ao clicar em "Login", você concorda com os termos de uso.</small>
                </form>
            </div>
        </div>
    </div>
@endsection
