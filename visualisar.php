<?php

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

    <title>Ver Detalhes</title>
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

                        <h4>Detalhes de Dados de Usuarios

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



                              

                                    <div class="mb-3">

                                        <label>Nome do Usuario</label>

                                        <p class="form-control">

                                            <?= $usuarioo['fullname'] ?>

                                        </p>
                                    </div>

                                    <div class="mb-3">

                                        <label>Email</label>
                                        <p class="form-control">

                                            <?= $usuarioo['email'] ?>

                                        </p>
                                    </div>

                                    <div class="mb-3">

                                        <label>Palavra Chave</label>
                                        <p class="form-control">

                                            <?= $usuarioo['password'] ?>

                                        </p>
                                    </div>
                                    <!--

                                      <div class="mb-3">

                                        <button type="submit" name="update" class="btn btn-primary">Actualizar dados do Usuario</button>
                                        </div>

                                    </form>
                                    -->







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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>