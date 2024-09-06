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
        <center><ont face = "Century Gothic" size = "6"><b> Exclusão de Produtos Cadastrados<b/><font size ="4">

        <font face = "Century Gothic" size = "3"><b>
        
        </b></center>
        <br>
        <font size = "4">
        
        <form name = "cliente" method = "POST" action = "">
            <fieldset id="a">
                <legend><b> Informe o ID do produto desejado: </b></legend>
                <p> ID <input name = "txtid" type = "text" size = "20" maxlength = "5" placeholder = "TODO">
                <br><br><center>
                <button name = "btnEnviar" value = "Excluir">
                <button name = "btnLimpar" value = "Limpar">
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