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
        <form name="cliente" method="POST" action="">
            <h2 class="title"> Consulta de Produtos </h2>
            <br>
            <div class="row">
                <label for="">Nome</label>
                <input name="txtnome" type="text" size="40" maxlength="40" required>
            </div>
            <div class="row">
                <button name="btnEnviar" type="submit">Consulta</button>
                <button name="btnLimpar" type="reset">Limpar</button>
            </div>
        </form>
    </section>

    <section>
        <form action="">
            <h2>Resultado:</h2>
    <?php
    extract ($_POST, EXTR_OVERWRITE);
    if(isset($btnEnviar)) {
        include_once 'Produto.php';
        $p = new Produto();
        $p -> setNome($txtnome); // o . '%' serve para uma busca aproximada da determinada letra informada
        $pro_bd = $p -> consultar();
        foreach ($pro_bd as $pro_mostrar) {
            ?> <br>
            <b> <?php echo "ID: " . $pro_mostrar[0]; ?> <br><br> </b>
            <b> <?php echo "Nome: " . $pro_mostrar[1]; ?> <br><br> </b>
            <b> <?php echo "Estoque: " . $pro_mostrar[2]; ?> <br><br> </b>
            <?php 
        }
    } 
    ?>

        </form>
    </section>
</body>

</html>