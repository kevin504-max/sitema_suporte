{{-- MODAL CREATE ASSUNTO --}}
<div id="modalCreateSubject" class="modal inmodal fade" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Cadastrar Novo Assunto</h4>
            </div>
            <form action="{{ route('dashboard.subjects.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <label for="name">Descrição</label>
                            <input name="description" id="description" class="form-control" placeholder="e.g. Problemas operacional" required />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="code">Código</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="e.g. 007" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL UPDATE ASSUNTO --}}
<div id="modalUpdateSubject" class="modal inmodal fade" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Atualizar Assunto</h4>
            </div>
            <form action="{{ route('dashboard.subjects.update') }}" method="POST">
                @csrf
                @method("PUT")
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <label for="name">Descrição</label>
                            <input name="description" id="description_update" class="form-control" placeholder="e.g. Problemas operacional" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="code">Código</label>
                            <input type="text" name="code" id="code_update" class="form-control" placeholder="e.g. 007">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL DELETE SUBJECT --}}
<div id="modalDeleteSubject" class="modal inmodal fade" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Excluir Assunto</h4>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Você tem certeza que deseja <strong>excluir</strong> este assunto?</h5>
                <span class="text-danger">Está operação não é reversível.</span>
            </div>
            <form action="{{ route('dashboard.subjects.destroy') }}" method="POST">
                @csrf
                @method("DELETE")
                <input type="hidden" name="id" id="id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Sim, Excluir!</button>
                </div>
            </form>
        </div>
    </div>
</div>
