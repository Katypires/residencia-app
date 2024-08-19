@extends('layouts.app')

@section('content')
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Inscrições para Residência Médica e
                    Multiprofissional</h1>
                <p class="col-lg-10 fs-4">Preencha os campos para realizar sua inscrição. </p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form method="POST" action="{{ route('register') }}" class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
                    @csrf

                    <div class="form-floating mb-3">
                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror"
                            name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus
                            placeholder="Nome">
                        <label for="nome">Nome*</label>
                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="nome_social" type="text"
                            class="form-control @error('nome_social') is-invalid @enderror" name="nome_social"
                            value="{{ old('nome_social') }}" autocomplete="nome_social" autofocus placeholder="Nome Social">
                        <label for="nome_social">Nome social</label>
                        @error('nome_social')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="celular" type="text" class="form-control @error('celular') is-invalid @enderror"
                            name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus
                            placeholder="Celular">
                        <label for="celular">Celular*</label>
                        @error('celular')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="cpf" type="text" class="form-control @error('cpf') is-invalid @enderror"
                            name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf" autofocus
                            placeholder="CPF">
                        <label for="cpf">CPF*</label>
                        @error('cpf')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('#cpf').mask('000.000.000-00');
                        });
                    </script>


                    <div class="form-floating mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                        <label for="email">Email*</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="Senha">
                        <label for="password">Senha*</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Confirme a Senha">
                        <label for="password-confirm">Confirme senha*</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>

                    <hr class="my-4">
                    <small class="text-body-secondary"></small>
                </form>
            </div>
        </div>
    </div>
@endsection
