<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/produto.png" />
    <title>Login</title>
</head>

<body>
    <section class="sessao">
        <h2>Login de acesso</h2> 
        <form name="cliente" method="POST" action="">
            <div class="row">
                <label for="">Usuário</label>
                <input name="txtusuario" type="text" required>
            </div>
            <div class="row">
                <label for="">Senha</label>
                <input name="txtsenha" type="password" maxlength="3" required>
            </div>
            <div class="row">
                <button name = "btnEnviar" type="submit">Entrar</button>
                <button name = "btnLimpar" type="reset">Limpar</button>
            </div>
        </form>
    </section>

    <?php 
    extract($_POST, EXTR_OVERWRITE);
    if(isset($btnEnviar))
    {
        include_once 'Usuario.php';
        $u = new Usuario();
        $u->setUsuario($txtusuario);
        $u->setSenha($txtsenha);
        $pro_bd=$u->logar();

        $existe = false;
        foreach($pro_bd as $pro_mostrar) 
        {
            $existe = true; ?>
            <script type="text/javascript">
                    $(document).ready(function() {
                    Swal.fire({
                        title: "Seja bem vindo!",
                        confirmButtonColor: "#39393b",
                        color: "#201b2c",
                        
                        imageUrl: "img/zebra correndo.gif",
                        imageWidth: 200,
                        imageAlt: "Zebra correndo",
                        
                        background: "#100d16",
                    }).then((result) => {
                        if (result.isConfirmed) {
                        window.location.href = 'menu.html'; // Redireciona ao clicar no botão de confirmação
                    }
                    });
                });
            </script>
            <?php
        }
        if($existe==false) {
            header("location:loginInvalido.php");
        }
    }
    ?>

</body>

</html>