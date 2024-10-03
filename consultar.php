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
        <h2>Consulta de Produtos Cadastrados</h2> 

        <form name="cliente" method="POST" action="">
            <fieldset id="a">
                <legend><b>Informe o Nome do produto desejado: </b></legend>
                <p> Nome: <input name="txtnome" type="text" size="40" maxlenght="40" placeholder="Nome do produto" required></p>
                <button name="btnEnviar" type="submit">Cadastrar</button>
                <button name="btnLimpar" type="reset">Limpar</button>
            </fieldset>

            <fieldset id="b">
                <legend><b>Resultado: </b></legend>
            </fieldset>
        </form>

        <?php
        extract ($_POST, EXTR_OVERWRITE);
        if(isset($btnEnviar)) {
            include_once 'Produto.php';
            $p = new Produto();
            $p -> setNome($txtnome . '%'); // o . '%' serve para uma busca aproximada da determinada letra informada
            $pro_bd = $p -> consultar();
            foreach ($pro_bd as $pro_mostrar) {
                ?> <br>
                <b> <?php echo "ID: " . $pro_mostrar[0]; ?> </b>
                <b> <?php echo "Nome: " . $pro_mostrar[1]; ?> </b>
                <b> <?php echo "Estoque: " . $pro_mostrar[2]; ?> </b>
                <?php 
            }
        } ?>
    </section>
</body>

</html>