<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/produto.png" />
    <title>Consultar</title>
</head>

<body>
    <?php include_once 'layouts/navbar.php' ?>

    <section>
        <h2>Exclusão de Produtos Cadastrados</h2> 
        <br>
        <form name = "cliente" method = "POST" action = "">
            <fieldset id="a">
                <legend><b> Informe o ID do produto desejado: </b></legend>
                <p> ID <input name = "txtid" type = "text" size = "20" maxlength = "5" placeholder = "TODO">
                <br><br><center>
                <button name = "btnEnviar" type="submit">Excluir</button>
                <button name = "btnLimpar" type="reset">Limpar</button>
            </fieldset>
        
            <fieldset id="b">
                <legend><b> Resultado </b></legend>
        
            <?php
                extract($_POST, EXTR_OVERWRITE);
                if(isset($btnEnviar)) {
                    include_once 'Produto.php';
                    $p = new Produto();
                    $p -> setId($txtid);
                    echo "<h3>" . $p -> exclusao() . "</h3>";
                }
            ?>
            </fieldset>
        </form>
    </section>
</body>

</html>