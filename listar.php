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
        <?php
        include_once 'produto.php';
        $p = new Produto();
        $pro_bd = $p->listar();
        ?>

        <b> Id &nbsp; &nbsp; &nbsp; &nbsp; Nome &nbsp; &nbsp; &nbsp; &nbsp;Estoque</b>

        <?php
        foreach ($pro_bd as $pro_mostrar) {
            ?>
            <br><br>
            <b> <?php echo $pro_mostrar[0]; ?></b> &nbsp; &nbsp; &nbsp; &nbsp;
            <?php echo $pro_mostrar[1]; ?> &nbsp;&nbsp;&nbsp;&nbsp;
            <?php echo $pro_mostrar[2]; ?>
            <?php
        }
        ?>
    </section>
</body>

</html>