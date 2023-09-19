@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Meus Chamados</h1>
            <button class="btn btn-primary float-end mr-0" data-bs-toggle="modal" data-bs-target="#modalCreateProduct">
                <i class="fa fa-plus"></i> Abrir Novo Chamado
            </button>
        </div>

        <div class="card-body">
            <table id="productsTable" class="table table-hover">
                <thead class="d-none">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Código</th>
                        <th class="text-center">Atendente</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($products as $product)
                        <tr>
                            <td class="text-center align-middle">{{ $product->id }}</td>
                            <td class="text-center align-middle">{{ $product->name }}</td>
                            <td class="text-center align-middle">{{ $product->code }}</td>
                            <td class="text-center align-middle">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="text-center align-middle">
                                <button
                                    class="btn btn-primary"
                                    type="button"
                                    data-bs-target="#modalUpdateProduct"
                                    data-bs-toggle="modal"
                                    data-product="{{ $product }}"
                                >
                                    <i class="fa fa-pen"></i>
                                </button>

                                <button
                                    class="btn btn-danger"
                                    type="button"
                                    data-bs-target="#modalDeleteProduct"
                                    data-bs-toggle="modal"
                                    data-id="{{ $product->id }}"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty --}}
                        <tr>
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('assets/Meerkats.svg') }}" alt="Nada para ver aqui..." class="w-50 mb-2">
                                <h2 class="text-center">Nada para ver aqui...</h2>
                            </div>
                        </tr>
                    {{-- @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
