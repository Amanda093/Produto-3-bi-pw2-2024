<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/produto.png" />
    <title>Cadastrar</title>
</head>

<body>
    <?php include_once 'layouts/navbar.php' ?>

    <section>
        <form name="cliente" method="POST" action="">
            <h2 class="title"> Dados do Produto </h2>
            <br>
            <div class="row">
                <label for="">Nome</label>
                <input name="txtnome" type="text" size="40" maxlength="40" required>
            </div>
            <div class="row">
                <label for="">Estoque</label>
                <input name="txtestoq" type="number" size="10" placeholder="0" required>
            </div>
            <div class="row">
                <button name="btnEnviar" type="submit">Cadastrar</button>
                <button name="btnLimpar" type="reset">Limpar</button>
            </div>
        </form>
    </section>
        <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnEnviar))
        {
            include_once 'Produto.php';
            $pro = new Produto();
            $pro -> setNome($txtnome);
            $pro -> setEstoque($txtestoq);
            echo $pro -> salvar();
        }
        ?>
</body>

</html>