{{-- MODAL VIEW USER --}}
<div id="modalViewUser" class="modal inmodal fade" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Detalhes do Usuário</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="col-md-12 mb-3">
                        <label for="name">Nome</label>
                        <input name="name" id="name" class="form-control" placeholder="e.g. Kevin Lucas" disabled />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="email">E-mail</label>
                        <input name="email" id="email" class="form-control" placeholder="e.g. kevinbrito2012@gmail.com" disabled />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="name">CPF</label>
                        <input name="cpf" id="cpf" class="form-control" placeholder="e.g. 999999999" disabled />
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="name">Entrou em</label>
                        <input name="created_at" id="created_at" class="form-control" placeholder="e.g. 2021-01-01 00:00:00" disabled />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

{{-- MODAL DELTE USER --}}
<div id="modalDeleteUser" class="modal inmodal fade" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Excluir Usuário</h4>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Você tem certeza que deseja <strong>excluir</strong> este usuário?</h5>
                <span class="text-danger">Está operação não é reversível.</span>
            </div>
            <form action="{{ route('dashboard.users.destroy') }}" method="POST">
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
