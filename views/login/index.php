<form name="formLogin" method="post" data-parsley-validate class="login">
    <div class="card">
        <div class="card-header">
        <div class="logo">🚀 HAINGPOINT</div>
        </div>
        <div class="card-body" >
            <label for="email"> Digite seu e-mail</label>
            <input type="email" name="email" id="email" required class="form-control" data-parsley-required-message="Preencha este campo" data-parsley-type-message="Digite um e-mail válido">


            <label for="senha"> Digite sua senha</label>
            <div class="input-group mb-3">
                <input type="password" name="senha" required class="form-control" id="senha"  data-parsley-required-message="Preencha este campo" data-parsley-errors-container="#error">
                <button type="button" class="btn btn-primary" botton onclick="mostrarSenha()">
                    <i class="fas fa-eye" function></i>

                </button>
            </div>
            <span id="error"></span>
            <button type="submit" class="btn btn-success w-100">
                Fazer login
            </button>

        </div>
        
    </div>

</form>
<script>
    function mostrarSenha() {
        var campo = document.getElementById("senha");
        if (campo.type == "password") {
            campo.type = "text";
        } else {
            campo.type = "password";
        }
    }
</script>