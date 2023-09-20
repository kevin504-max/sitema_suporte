@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h1>Bem vindo Dashboard do Administrador</h1>

        <div class="content mt-5">
            <div class="row">
                @forelse ($supports as $support)
                    <div class="col-md-4">
                        <div class="card shadow mt-2 support_data">
                            <input type="hidden" class="support_id" value="{{ $support->id }}">
                            <div class="card-header">
                                <h3>{{ $support->subject->description }}</h3>
                            </div>

                            <div class="card-body">
                                <p><strong>Código: </strong> {{ $support->code }}</p>
                                <p><strong>Solicitante: </strong> {{ $support->requester->name }}</p>
                                <p><strong>Descrição: </strong> {{ $support->description }}</p>
                                <p><strong>Status: </strong>
                                    @switch($support->status)
                                        @case(0)
                                            <span class="badge bg-success">Finalizado</span>
                                            @break
                                        @case(1)
                                            <span class="badge bg-info">Aberto</span>
                                        @break
                                        @case(2)
                                            <span class="badge bg-warning">Em atendimento</span>
                                            @break
                                        @default
                                            <span class="badge bg-info">Aberto</span>
                                            @break
                                    @endswitch
                                </p>
                                <p><strong>Aberto em: </strong> {{ $support->created_at->format('d/m/Y H:i') }}</p>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('dashboard.supports.attend', ['id' => $support->id]) }}" class="btn btn-primary btn-md p-1 m-3">Atender chamado</a>
                            </div>
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
</div>
@endsection
