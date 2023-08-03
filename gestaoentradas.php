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

    <title>Gestão de Entradas</title>

</head>

<body style="background-color: black;">

    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4 style="text-align: center;">Tabela de Entradas
                            <a href="formularioentradas.php" class="btn btn-primary float-end">NOVA ENTRADA</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borded table-striped">
                            <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>ID_PRODUTO</th>
                                    <th>QUENTIDADE</th>
                                    <th>CUSTO</th>
                                    <th>FORNECEDOR</th>
                                    <th>FACTURA</th>
                                    <th>DATA </th>
                                    <th>USUARIO</th>
                                    <th>UPDATE</th>
                                    <th>USUARIO_UPDATE</th>


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
                                    foreach ($query_run as $entradas) {
                                ?>

                                        <tr>

                                            <td><?= $entradas['id']; ?></td>
                                            <td><?= $entradas['idproduto']; ?></td>
                                            <td><?= $entradas['quantidadee']; ?></td>
                                            <td><?= $entradas['custo']; ?></td>
                                            <td><?= $entradas['fornecedor']; ?></td>
                                            <td><?= $entradas['factura']; ?></td>
                                            <td><?= $entradas['dataEntrada']; ?></td>
                                            <td><?= $entradas['usuarioEntrada']; ?></td>
                                            <td><?= $entradas['dataEdicao']; ?></td>
                                            <td><?= $entradas['usuarioEdicao']; ?></td>

                                            <td>
                                                <a href="visualisarentrada.php?id=<?= $entradas['id']; ?>" class="btn btn-info btn-sm" style="text-align: center;">Ver</a>
                                                <a href="editarentradas.php?id=<?= $entradas['id']; ?>" class="btn btn-success btn-sm" style="text-align: center;">Editar</a>

                                                <form action="operacoesentradas.php" method="POST" class="d-inline">

                                                    <button type="submit" name="excluir" value="<?= $entradas['id']; ?>" class="btn btn-danger btn-sm" style="text-align: center;">Excluir</button>

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