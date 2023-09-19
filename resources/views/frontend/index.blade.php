@extends('layouts.app')

@section('content')
<div class="py-5">
    <h1 class="display-5 fw-bold text-center">Bem vindo ao nosso sistema de suporte ao usuário!</h1>
    <div class="col-lg-6 mx-auto">
        <img src="{{ asset('assets/logo.jpeg') }}" alt="Logo ProConsult Engenharia" class="img-fluid rounded-circle mb-4" width="200" height="200">
        <p class="fs-5 mb-4">
            Descubra um Novo Mundo de Possibilidades!
            Explore, Crie e Transforme com ProConsult Engenharia.
            Sinta a Inovação ao Seu Alcance. Conheça Nossos Serviços.
        </p>
        <div class="d-grid gap-2 mt-2 d-sm-flex justify-content-sm-center">
            @if (Auth::user())
                <a href="{{ route('register') }}" type="button" class="btn btn-primary btn-lg px-4">Seguir para atendimento</a>
            @else
                <a href="{{ route('login') }}" type="button" class="btn btn-outline-primary btn-lg px-4 me-sm-3 fw-bold">Efetuar Login</a>
                <a href="{{ route('register') }}" type="button" class="btn btn-primary btn-lg px-4">Sou novo por aqui</a>
            @endif
        </div>
    </div>
</div>
@endsection
