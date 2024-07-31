<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/produto.png" />
    <title>Listar</title>
</head>

<body>
    <?php include_once 'layouts/navbar.php' ?>

    <section>
        <form name="cliente" method="POST" action="">
            <fieldset id="a">
                <legend><b> Dados do Produto </b></legend>
                <p> Nome: <input name="txtnome" type="text" size="40" maxlength="40" placeholder="Nome do Produto"></p>
                <p> Estoque: <input name="txtestoq" type="text" size="10" placeholder="0"></p>
            </fieldset>
            <br>
            <fieldset id="b">
                <legend><b> Opções </b></legend>
                <br>
                <input name="btnEnviar" type="submit" value="Cadastrar">
                <input name="limpar" type="reset" value="Limpar">
            </fieldset>
        </form>

        <?php
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnEnviar))
        {
            include_once 'Produto.php';
            $pro = new Produto();
            $pro -> setNome($txtnome);
            $pro -> setEstoque($txtestoq);
            echo "<h3><br><br>" . $pro -> salvar() . "</h3>";
        }
        ?>
    </section>
</body>

</html>