<?php

?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de Produtos</h2>
            </div>
            <div class="float-end">
                <a href="produto" class="btn btn-info">
                    Novo Registro
                </a>
                <a href="produto/listar" class="btn btn-info">
                    Listar Registros
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <form name="formCadastro" method="post" action="produto/salvar"
            data-parsley-validate enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <label for="id">ID</label>
                        <input type="text" name="id" id="id"
                        class="form-control" readonly>
                    </div>

                    <div class="col-12 col-md-7">
                        <label for="nome">Nome do Produto</label>
                        <input type="text" name="nome" id="nome" class="form-control"
                        required data-parsley-required-message="Preencha este campo">
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="categoria_id">Selecione a Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="form-control"
                        required data-parsley-required-message="Selecione">
                            <option value="">Selecione</option>
                            <?php
                                $dadosCategoria = $this->categoria->listar();
                                foreach($dadosCategoria as $dados) {
                                    echo "<option value='{$dados->id}'>{$dados->nome}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-2">
                        <label for="ativo">Ativo</label>
                        <select name="ativo" id="ativo" class="form-control"
                        required data-parsley-required-message="Selecione">
                            <option value="">Selecione</option>
                            <option value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success">
                    Enviar Dados
                </button>
            </form>
        </div>

    </div>
</div>
<script>
    $("#id").val("<?=$id?>");
    $("#nome").val("<?=$nome?>");
    $("#ativo").val("<?=$ativo?>");
</script>