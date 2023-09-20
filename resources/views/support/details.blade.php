@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Detalhes do Chamado</h1>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
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
                    </div>
                    <div class="col-md-6">
                        <p><strong>Atendente: </strong> {{ $support->assistant->name ?? ' - ' }}</p>
                        <p><strong>Assunto: </strong> {{ $support->subject->description }}</p>
                        <p><strong>Descrição: </strong> {{ $support->description }}</p>
                        <p><strong>Aberto em: </strong> {{ $support->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-outline-primary btn-md p-2 m-3"
                            class="btn btn-primary float-end"
                            data-bs-toggle="modal"
                            data-bs-target="#modalRatingSupport"
                            data-support="{{ $support }}"
                        >Avaliar chamado</button>
                        <button
                            type="button"
                            class="btn btn-primary float-end"
                            data-bs-toggle="modal"
                            data-bs-target="#modalUpdateSupport"
                            data-support="{{ $support }}"
                        >Comentar chamado</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('modals')
@include('support._modals')
@endsection

@section('scripts')
@include('support._scripts')
@endsection
