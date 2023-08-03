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

    <title>Banco de Dados</title>

</head>

<body style="background-color: black;">

    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="text-align: center;">Tabela de Dados de Usuarios
                            <a href="cadastro.php" class="btn btn-primary float-end">Novo Registro</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borded table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOME </th>
                                    <th>EMAIL</th>
                                    <th>SENHA</th>
                                    <th>DATA</th>
                                    <th style="text-align: center;">AÇÕES</th>
                                </tr>
                            </thead>

                            <tbody style="border-color: red;">
                                <?php
                                $query = "SELECT * FROM users";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $usuarios) {
                                ?>

                                        <tr>

                                            <td><?= $usuarios['id']; ?></td>
                                            <td><?= $usuarios['fullname']; ?></td>
                                            <td><?= $usuarios['email']; ?></td>
                                            <td><?= $usuarios['password']; ?></td>
                                            <td><?= $usuarios['data']; ?></td>

                                            <td>
                                                <a href="visualisar.php?id=<?= $usuarios['id']; ?>" class="btn btn-info btn-sm" style="text-align: center;">Ver</a>
                                                <a href="editar.php?id=<?= $usuarios['id']; ?>" class="btn btn-success btn-sm" style="text-align: center;">Editar</a>

                                                <form action="operacoes.php" method="POST" class="d-inline">

                                                    <button type="submit" name="excluir" value="<?= $usuarios['id']; ?>" class="btn btn-danger btn-sm" style="text-align: center;">Excluir</button>

                                                </form>

                                            </td>

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