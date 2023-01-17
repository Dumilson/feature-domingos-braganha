<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Pessoa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action=" {{ route('home.store') }} ">
            <div class="modal-body">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="">Nome</label>
                        <span class="text-danger">*</span>
                        <input type="text" name="nome_pessoa" class="form-control" placeholder="Informe o nome da Pessoa ">
                    </div>

                    <div class="form-group mb-2">
                        <label for="">Cep</label>
                        <span class="text-danger">*Sem caracteres</span>
                        <input type="number" name="cep" class="form-control" placeholder="Informe o numero do Cep" onblur="getCep()" id="cep">
                    </div>

                    <div class="form-group mb-2">
                        <label for="">Endereço</label>
                        <input type="text" name="endereco" class="form-control" placeholder="Dados automaticos" readonly id="endereco">
                    </div>

                    <div class="form-group mb-2">
                        <label for="">Localidade</label>
                        <input type="text" name="localidade" class="form-control" placeholder="Dados automaticos" readonly id="localidade">
                    </div>

                    <div class="form-group mb-2">
                        <label for="">Bairro</label>
                        <input type="text" name="bairro" class="form-control" placeholder="Dados automaticos" readonly id="bairro">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>
