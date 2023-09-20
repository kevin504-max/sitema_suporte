{{-- MODAL CREATE SUPPORT --}}
<div id="modalCreateSupport" class="modal inmodal fade" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Abrir Novo Chamado</h4>
            </div>
            <form action="{{ route('support.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-6 mb-3">
                            <label for="name">Solicitante</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Rádio" readonly value="{{ Auth::user()->name }}">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="code">Código</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="O código será gerado ao abrir o chamado." readonly>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="code">Assunto</label>
                            <select name="subject" id="subject_create" class="form-control" required>
                                <option value=""></option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->description }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="price">Descrição</label>
                            <textarea
                                name="description"
                                id="description"
                                class="form-control"
                                placeholder="e.g. Estou com dificuldades de acessar a plataforma pelo meu computador."
                                required
                            ></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Abrir Chamado</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL VIEW SUPPORT --}}
<div id="modalViewSupport" class="modal inmodal fade" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Detalhes do Chamado</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-md-6 mb-3">
                        <label for="name">Solicitante</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Rádio" readonly value="{{ Auth::user()->name }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="code">Código</label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="O código será gerado ao abrir o chamado." readonly>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="code">Assunto</label>
                        <select name="subject" id="subject_update" class="form-control" disabled>
                            <option value=""></option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->description }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="price">Descrição</label>
                        <textarea
                            name="description"
                            id="description_update"
                            class="form-control"
                            placeholder="e.g. Estou com dificuldades de acessar a plataforma pelo meu computador."
                            disabled
                        ></textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
