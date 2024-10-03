<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/produto.png" />
    <title>Alterar</title>
</head>

<body>
    <?php include_once 'layouts/navbar.php' ?>

    <section>
        <h2>Alteração de Produtos Cadastrados</h2> 

        <form name="cliente" method = "POST" action = "alterar2.php">
            <fieldset>
                <legend><b> Informe o ID do produto desejado: </b></legend>
                <p> Id: <input name="txtid" type="text" size="20" maxlength="5" placeholder="Id do Produto">
                <br><br>
                <button name="btnEnviar" type="submit">Alterar</button>
                <button name="btnLimpar" type="reset">Limpar</button>
            </fieldset>
        </form>
    </section>
</body>

</html>