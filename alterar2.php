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

    <section>
        <h2>Alteração de Produtos Cadastrados</h2> 
        <form name="cliente2" method = "POST" action="">
            <fieldset>
                <legend><b> Alterar </b></legend>
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
                
                <?php
                foreach($pro_bd as $pro_mostrar)
                {
                ?>
                
                <input type="hidden" name="txtid" size="5" value='<?php echo $pro_mostrar[0]?>'>
                <b> <?php echo "ID: " . $pro_mostrar[0]; // como é matriz - posição 0 ?> </b>
                <br><br> <b> <?php echo "Nome: "; ?> </b>
                <input type="text" name="txtnome" size="25" value='<?php echo $pro_mostrar[1]?>'>
                <br><br> <b> <?php echo "Estoque: "; ?> </b>
                <input type="text" name="txtestoque" size="10" value='<?php echo $pro_mostrar[2]?>'>
                <br><br><center>
                <button name="Enviar" type="submit">Alterar</button>
                <?php
                }
                ?>
            </fieldset>
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