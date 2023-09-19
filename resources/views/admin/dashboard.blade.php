@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>Bem vindo Dashboard do Administrador</h1>

        <div class="content mt-5">
            @forelse ($supports as $support)
                <div class="col-md-4">
                    <div class="card shadow mt-2 product_data">
                       teste
                    </div>
                </div>
            @empty
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('assets/Meerkats.svg') }}" alt="Nenhum chamado registrado..." class="w-50 mb-2">
                    <h2 class="text-center">Nenhum chamado registrado...</h2>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
