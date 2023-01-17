@extends('template.app')
@section('content')
@include("pages.components.modal-create")
<div class="mt-4">
    <h1>
        Cadastro de Pessoas
    </h1>

    <button class="btn btn-primary mt-4 mb-4"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Cadastrar Pessoa
    </button>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Cep</th>
        <th scope="col">Endereço</th>
        <th scope="col">Complemento</th>
        <th scope="col">Bairro</th>
        <th scope="col">Acção</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>
            <a href="#" class="btn btn-sm btn-warning">Editar</a>
            <a href="#" class="btn btn-sm btn-danger">Apagar</a>
        </td>
      </tr>
    </tbody>
  </table>
@endsection