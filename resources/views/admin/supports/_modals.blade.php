{{-- MODAL UPDATE SUPPORT --}}
<div id="modalUpdateSupport" class="modal inmodal fade" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4>Atualizar Chamado</h4>
            </div>
            <form action="{{ route('dashboard.supports.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12 mb-3">
                            <label for="name">Solicitante</label>
                            <input type="text" name="name" id="name_update" class="form-control" placeholder="e.g. Kevin Lucas" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="code">Código</label>
                            <input type="text" name="code" id="code_update" class="form-control" placeholder="O código será gerado ao abrir o chamado." readonly>
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
                                readonly
                            ></textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status_update" class="form-control">
                                <option value=""></option>
                                <option value="0">Finalizado</option>
                                <option value="1">Aberto</option>
                                <option value="2">Em atendimento</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="assistant">Atendente</label>
                            <select name="assistant" id="assistant_update" class="form-control">
                                <option value=""></option>
                                @foreach ($assistants as $assistant)
                                    <option value="{{ $assistant->id }}" @if($assistant->id == Auth::user()->id) selected @endif>{{ $assistant->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="custom-file-label" for="file">Anexar arquivo</label>
                            <input type="file" name="file" id="file_update" class="custom-file-input">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Atualizar Chamado</button>
                </div>
            </form>
        </div>
    </div>
</div>
