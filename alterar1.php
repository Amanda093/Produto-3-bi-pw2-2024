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

    <?php
        include_once 'Produto.php';
        $p = new Produto();
        $pro_bd = $p -> listar();
    ?>
    <section class="sessao">
        <form name="cliente" method = "POST" action = "alterar2.php">
            <h2> Alteração do Produto Desejado </h2>
            <br>
            <div class="row">
                <label for="">Id</label>
                <select name="txtid" size="1">
                        <?php foreach ($pro_bd as $pro_mostrar) {
                            echo '<option value = "' . $pro_mostrar[0] . '">' . $pro_mostrar[0] . ' - ' . $pro_mostrar[1] .'</option>';
                        } ?>
                </select>
            </div>
            <div class="row">
                <button name="btnEnviar" type="submit">Alterar</button>
                <button name="btnLimpar" type="reset">Limpar</button>
            </div>    
        </form>
    </section>
</body>

</html>