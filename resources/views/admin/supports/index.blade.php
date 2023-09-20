@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Gestão de Chamados</h1>
        </div>

        <div class="card-body">
            <table id="supportsTable" class="table table-hover">
                <thead @if($supports->count() == 0) class="d-none" @endif>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Código</th>
                        <th class="text-center">Solicitante</th>
                        <th class="text-center">Atendente</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Criado em</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($supports as $support)
                        <tr>
                            <td class="text-center align-middle">{{ $support->id }}</td>
                            <td class="text-center align-middle">{{ $support->code }}</td>
                            <td class="text-center align-middle">{{ $support->requester->name }}</td>
                            <td class="text-center align-middle">{{ $support->assistant->name ?? ' - ' }}</td>
                            <td class="text-center align-middle">
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
                            </td>
                            <td class="text-center align-middle">{{ $support->created_at->format('d/m/Y') }}</td>
                            <td class="text-center align-middle">
                                <button
                                    class="btn btn-primary"
                                    type="button"
                                    data-bs-target="#modalUpdateSupport"
                                    data-bs-toggle="modal"
                                    data-support="{{ $support }}"
                                >
                                    <i class="fa fa-pen"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('assets/Meerkats.svg') }}" alt="Nenhum chamado aberto..." class="w-50 mb-2">
                                <h2 class="text-center">Nenhum chamado aberto...</h2>
                            </div>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('modals')
@include('admin.supports._modals')
@endsection

@section('scripts')
@include('admin.supports._scripts')
@endsection
