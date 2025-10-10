<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de categorias</h2>
            </div>
            <div class="float-end">
<a href="categoria" class="btn btn-info">novo</a>
<a href="categoria/listar" class="btn btn-info">
    Listar registro
</a>
            </div>
        </div>
        <div class="card-body">
            <form name="formCadastro" method="post" action="categoria/salvar" data-parsley-validate>

<div class="row">
    <div class="col-12 col-md-2">
    <label for="id">ID</label>
    <input type="text" name="id" id="id" class="form-control" readonly>
    </div>

    <div class="col-12 col-md-8">

    </div><label for="nome">Nome da Categoria</label>
    <input type="text" name="nome" id="nome" class="form-control" required data-parsley-message="Preencha este campo">
</div>
<div class="col-12 col-md-12">
    <label for="ativo">Ativo</label>
    <select name="ativo" id="ativo" class="form-control" required data-parsley-message="Selecione">
        <option value="">Selecione</option>
        <option value="S">Sim</option>
        <option value="N">Não</option>
    </select>
</div>
<br>
<button type="submit" class="btn btn-success">salvar</button>

            </form>
        </div>
    </div>
</div>