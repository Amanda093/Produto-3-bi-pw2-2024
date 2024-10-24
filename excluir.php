<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/produto.png" />
    <title>Excluir</title>
</head>

<body>
    <?php include_once 'layouts/navbar.php' ?>

    <section class="sessao">
        <form name="cliente" method="POST" action="">
            <h2 class="title"> Exclusão de Produtos </h2>
            <br>
            <div class="row">
                <label for="">Id</label>
                <input name = "txtid" type="text" size="20" maxlength="5" required>
            </div>
            <div class="row">
                <button name="btnEnviar" type="submit">Excluir</button>
                <button name="btnLimpar" type="reset">Limpar</button>
            </div>
        </form>
    </section>

    <?php
    extract($_POST, EXTR_OVERWRITE);
    if(isset($btnEnviar)) {
        include_once 'Produto.php';
        $p = new Produto();
        $p -> setId($txtid);
        echo $p -> exclusao();
    }
    ?>

</body>

</html>