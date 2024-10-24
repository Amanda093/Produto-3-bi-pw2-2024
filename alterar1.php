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
        <h2> Informe o ID do produto desejado: </h2>
        <form name="cliente" method = "POST" action = "alterar2.php">
            <br>
            <div class="row">
                <label for="">Id</label>
                <input name="txtid" type="text" size="20" maxlength="5" placeholder="Id do Produto">
            </div>
            <div class="row">
                <button name="btnEnviar" type="submit">Alterar</button>
                <button name="btnLimpar" type="reset">Limpar</button>
            </div>    
        </form>
    </section>
</body>

</html>