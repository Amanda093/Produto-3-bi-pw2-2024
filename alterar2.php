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
        if (isset($_POST["txtid"])) {
            $txtid = $_POST["txtid"];
            include_once 'Produto.php';
            $p = new Produto();
            $p->setId($txtid);
            $pro_bd = $p->alterar(); // chamada de método com retorno - o $p é o parâmetro enviado
        } else {
            echo "ID do produto não informado.";
            exit;
        }
    ?>

    <section>
        <form name="cliente" method = "POST" action = "alterar2.php">
            <h2> Alteração do Produto Desejado </h2>
            <br>
            <div class="row">
            <?php
                foreach($pro_bd as $pro_mostrar)
                {
                ?>
                
                <input type="hidden" name="txtid" size="5" value='<?php echo $pro_mostrar[0]?>'>
                <b> <?php echo "<label>Id</label><br>" . $pro_mostrar[0]; // como é matriz - posição 0 ?> </b>
                <br><br> <b> <?php echo "<label>Nome</label>"; ?> </b>
                <input type="text" name="txtnome" size="25" value='<?php echo $pro_mostrar[1]?>'>
                <br><br> <b> <?php echo "<label>Estoque</label>"; ?> </b>
                <input type="text" name="txtestoque" size="10" value='<?php echo $pro_mostrar[2]?>'>
                <?php
                }
                ?>
            </div>
            <div class="row">
                <button name="btnEnviar" type="submit">Alterar</button>
                <button name="btnLimpar" type="reset">Limpar</button>
            </div>    
        </form>

        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($Enviar))
        {
            $p->setNome($txtnome);
            $p->setEstoque($txtestoq);
            $p->setId($txtid);
            echo "<br><h3>" . $p->alterar2() . "</h3>";
            header("location:alterar1.php");
        }
        ?>
    </section>
</body>

</html>