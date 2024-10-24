<!DOCTYPE html>
<html lang="pt-br">

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

        <table>
        <tr> <th> Id </th> <th> Nome </th> <th> Estoque </th> </tr>
    
            <?php
            foreach ($pro_bd as $pro_mostrar) {
                ?>
                <br><br>
                <tr> <th> <?php echo $pro_mostrar[0]; ?> </th>  </b> 
                <td> <?php echo $pro_mostrar[1]; ?> </td>
                <td> <?php echo $pro_mostrar[2]; ?> </td>
                <?php
            }
            ?>
        </table>
    </section>
</body>

</html>