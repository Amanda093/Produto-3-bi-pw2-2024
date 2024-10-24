<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="img/produto.png" />
    <title>Alterar2</title>
</head>

<body>
    <?php include_once 'layouts/navbar.php' ?>

    <?php
            $txtid = $_POST["txtid"];
            include_once 'Produto.php';
            $p = new Produto();
            $p->setId($txtid);
            $pro_bd = $p->alterar(); // chamada de método com retorno - o $p é o parâmetro enviado
    ?>


    <section>
        <form name="cliente" method = "POST" action = "alterar2.php">
            <h2> Alteração do Produto Desejado </h2>
            <br>
            <?php
                foreach($pro_bd as $pro_mostrar)
                {
                ?>
                <div class="row">
                    <label for="">Id</label>
                    <input class="input_disabled" type="text" name="txtid" size="5" value='<?php echo $pro_mostrar[0] ?>' tabindex="-1">
                </div>

                <div class="row">
                    <label for="">Nome</label>
                    <input type="text" name="txtnome" size="5" value='<?php echo $pro_mostrar[1] ?>'>
                </div>

                <div class="row">
                    <label for="">Estoque</label>
                    <input type="number" name="txtestoque" size="5" value='<?php echo $pro_mostrar[2] ?>'>
                </div>
                <?php
                }
                ?>
            <div class="row">
                <button name="Enviar" type="submit">Alterar</button>
                <button name="btnLimpar" type="reset">Limpar</button>
            </div>    
        </form>
    </section>

    <?php
    extract($_POST, EXTR_OVERWRITE);
    if (isset($Enviar))
        {
            $p->setNome($txtnome);
            $p->setEstoque($txtestoque);
            $p->setId($txtid);
            echo "<br><h3>" . $p->alterar2() . "</h3>";
            header("location:alterar1.php");
        }
        ?>
</body>

</html>