@extends('template.app')
@section('content')
<div class="mt-4">
    <h1>
        Cadastro de Pessoas
    </h1>

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <li>{{ $error }}</li>
    </div>
    @endforeach
    @endif

    <button class="btn btn-primary mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Cadastrar Pessoa
    </button>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cep</th>
                <th scope="col">Endereço</th>
                <th scope="col">Localidade</th>
                <th scope="col">Bairro</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->count() == 0)
                 <td colspan="6"><h1 class="text-center">Sem registros</h1></td>
            @endif
            @foreach ($data as $pessoa)
            <tr>
                <th scope="row"> {{ $pessoa->id_pessoa_pk }} </th>
                <td>{{ $pessoa->nome_pessoa }}</td>
                <td>{{ $pessoa->cep }}</td>
                <td>{{ $pessoa->endereco }}</td>
                <td>{{ $pessoa->localidade }}</td>
                <td>{{ $pessoa->bairro }}</td>
            </tr>
            @endforeach
        </tbody>
        {{ $data->links() }}
    </table>
</div>
@endsection

@push('js')
<script>
    function getCep() {
        var cep = document.getElementById("cep").value
        $.ajax({
            type: "GET"
            , url: "/buscar-cep/" + cep
            , dataType: "json"
            , success: function(response) {
                if (response.error == false) {
                    $("#bairro").val(response.message.bairro)
                    $("#endereco").val(response.message.logradouro)
                    $("#localidade").val(response.message.localidade)
                } else if (response.error == true) {
                    alert(response.message)
                } else {
                    alert("Atualiza a pagina")
                }

            }
        });
    }

</script>
@endpush
