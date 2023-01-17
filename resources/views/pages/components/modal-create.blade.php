<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Pessoa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="">
                    @csrf
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" name = "nome_pessoa" class="form-control" placeholder="Informe o nome da Pessoa ">
                    </div>

                    <div class="form-group">
                        <label for="">Cep</label>
                        <input type="text" name = "cep" class="form-control" placeholder="Informe o numero do Cep" onblur="getCep()" id="cep">
                    </div>

                    <div class="form-group">
                        <label for="">Endereço</label>
                        <input type="text" name = "endereco" class="form-control" placeholder="Dados automaticos" disabled id="endereco">
                    </div>

                    <div class="form-group">
                        <label for="">Localidade</label>
                        <input type="text" name = "localidade" class="form-control" placeholder="Dados automaticos" disabled id="localidade" >
                    </div>

                    <div class="form-group">
                        <label for="">Bairro</label>
                        <input type="text" name = "bairro" class="form-control" placeholder="Dados automaticos" disabled id="bairro">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
