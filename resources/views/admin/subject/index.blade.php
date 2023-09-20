@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Gestão de Assuntos de Chamado</h1>
            <button class="btn btn-primary float-end mr-0" data-bs-toggle="modal" data-bs-target="#modalCreateSubject">
                <i class="fa fa-plus"></i> Registrar Assunto
            </button>
        </div>

        <div class="card-body">
            <table id="subjectsTable" class="table table-hover">
                <thead @if($subjects->count() == 0) class="d-none" @endif>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Código</th>
                        <th class="text-center">Descrição</th>
                        <th class="text-center">Criado em</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($subjects as $subject)
                        <tr>
                            <td class="text-center align-middle">{{ $subject->id }}</td>
                            <td class="text-center align-middle">{{ $subject->description }}</td>
                            <td class="text-center align-middle">{{ $subject->code }}</td>
                            <td class="text-center align-middle">{{ $subject->created_at->format('d/m/Y') }}</td>
                            <td class="text-center align-middle">
                                <button
                                    class="btn btn-primary"
                                    type="button"
                                    data-bs-target="#modalUpdateSubject"
                                    data-bs-toggle="modal"
                                    data-subject="{{ $subject }}"
                                >
                                    <i class="fa fa-pen"></i>
                                </button>

                                <button
                                    class="btn btn-danger"
                                    type="button"
                                    data-bs-target="#modalDeleteSubject"
                                    data-bs-toggle="modal"
                                    data-id="{{ $subject->id }}"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('assets/Meerkats.svg') }}" alt="Nenhum assunto registrado..." class="w-50 mb-2">
                                <h2 class="text-center">Nenhum assunto registrado...</h2>
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
@include('admin.subject._modals')
@endsection

@section('scripts')
@include('admin.subject._scripts')
@endsection
