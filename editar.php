<?php
session_start();
require 'dbcon.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">




    <title>Sistema de Atualização de Dados</title>
</head>


<body>


    <div class="container mt-5">


        <?php
        include('message.php');
        ?>



        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">

                        <h4>Atualização de Dados

                            <a href="indice.php" class="btn btn-danger float-end">VOLTAR</a>

                        </h4>

                    </div>

                    <div class="card-body">

                        <?php


                        if (isset($_GET['id'])) {

                            $idusuario = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM users where id='$idusuario' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {

                                $usuarioo = mysqli_fetch_array($query_run);
                        ?>



                                <form action="operacoes.php" method="POST">


                                    <input type="hidden" name="idusuario" value="<?= $usuarioo['id'] ?>">


                                    <div class="mb-3">

                                        <label>Nome do Usuario</label>
                                        <input type="text" name="name" value="<?= $usuarioo['fullname'] ?>" class="form-control">

                                    </div>

                                    <div class="mb-3">

                                        <label>Email</label>
                                        <input type="email" name="email" value="<?= $usuarioo['email'] ?>" class="form-control">

                                    </div>

                                    <div class="mb-3">

                                        <label>Palavra Chave</label>
                                        <input type="password" name="password" value="<?= $usuarioo['password'] ?>" class="form-control">

                                    </div>
                                    <div class="mb-3">

                                        <button type="submit" name="update" class="btn btn-success">Actualizar dados do Usuario</button>
                                    </div>

                                </form>



                        <?php

                            } else {
                                echo "<h4>Nenhum Id Encontrado</h4>";
                            }
                        }


                        ?>




                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
</body>

</html>