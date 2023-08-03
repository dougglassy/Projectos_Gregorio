<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Gestão de vendas</title>
</head>

<body style="background-color: black;">

    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4 style="text-align: center;">Tabela de Saidas
                            <a href="formulariovendas.php" class="btn btn-primary float-end">Nova venda</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borded table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID_PRODUTO</th>
                                    <th>QTD</th>
                                    <th>COMPRA</th>
                                    <th>VENDA</th>
                                    <th>LUCRO_P</th>
                                    <th>L_TOTAL </th>
                                    <th>V_TOTAL</th>
                                    <th>DATA</th>
                                    <th>USUARIO</th>
                                    <th>DATA_EDIÇÃO</th>
                                    <th>USUARIO_EDIÇÃO</th>

                                    <!--  
                                  -->
                                    <th style="text-align: center;">AÇÕES</th>

                                </tr>
                            </thead>

                            <tbody style="border-color: red;">
                                <?php
                                $query = "SELECT * FROM entrada order by id desc";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $vendas) {
                                ?>

                                        <tr>

                                            <td><?= $vendas['id']; ?></td>
                                            <td><?= $vendas['idproduto']; ?></td>
                                            <td><?= $vendas['produtocodigo']; ?></td>
                                            <td><?= $vendas['quantidadee']; ?></td>
                                            <td><?= $vendas['custo']; ?></td>
                                            <td><?= $vendas['fornecedor']; ?></td>
                                            <td><?= $vendas['factura']; ?></td>
                                            <td><?= $vendas['dataEntrada']; ?></td>
                                            <td><?= $vendas['usuarioEntrada']; ?></td>
                                            <td><?= $vendas['dataEdicao']; ?></td>
                                            <td><?= $vendas['usuarioEdicao']; ?></td>


                                            <td>
                                                <a href="visualisarvenda.php?id=<?= $vendas['id']; ?>" class="btn btn-info btn-sm" style="text-align: center;">Ver</a>
                                                <a href="editarentradas.php?id=<?= $vendas['id']; ?>" class="btn btn-success btn-sm" style="text-align: center;">Editar</a>

                                                <form action="operacoes.php" method="POST" class="d-inline">

                                                    <button type="submit" name="excluir" value="<?= $vendas['id']; ?>" class="btn btn-danger btn-sm" style="text-align: center;">Excluir</button>

                                                </form>

                                            </td>

                                            <!--
                                            -->

                                        </tr>

                                <?php


                                    }
                                } else {

                                    echo "<h5>Nenhum Registro Encontrado</h5>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>