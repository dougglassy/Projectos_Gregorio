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




    <title>Detalhes Da Entrada</title>
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

                        <h4>Detalhes Da Entrada

                            <a href="gestaoentradas.php" class="btn btn-danger float-end">GESTÃO</a>

                        </h4>

                    </div>

                    <div class="card-body">

                        <?php


                        if (isset($_GET['id'])) {

                            $identrada = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM entrada where id='$identrada' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {

                                $consultaentrada = mysqli_fetch_array($query_run);
                        ?>



                                <form action="operacoesvendas.php" method="POST">


                                    <input type="hidden" name="id" value="<?= $consultaentrada['id'] ?>">


                                    <div class="mb-3">

                                        <label>ID PRODUTO</label>
                                        <input type="number" name="idproduto" value="<?= $consultaentrada['idproduto'] ?>" class="form-control">

                                        <label>CODIGO</label>
                                        <input type="text" name="produtocodigo" value="<?= $consultaentrada['produtocodigo'] ?>" class="form-control">

                                        <label>QTD</label>
                                        <input type="number" name="quantidadee" value="<?= $consultaentrada['quantidadee'] ?>" class="form-control">

                                        <label>CUSTO</label>
                                        <input type="number" name="custo" value="<?= $consultaentrada['custo'] ?>" class="form-control">


                                    </div>

                                    <div class="mb-3">

                                        <label>FORNECEDOR</label>
                                        <input type="text" name="fornecedor" value="<?= $consultaentrada['fornecedor'] ?>" class="form-control">

                                        <label>FACTURA</label>
                                        <input type="text" name="factura" value="<?= $consultaentrada['factura'] ?>" class="form-control">

                                        <label>DATA</label>
                                        <input type="text" name="dataEntrada" value="<?= $consultaentrada['dataEntrada'] ?>" class="form-control">

                                        <label>USUARIO</label>
                                        <input type="text" name="usuarioEntrada" value="<?= $consultaentrada['usuarioEntrada'] ?>" class="form-control">

                                    </div>

                                    <div class="mb-3">

                                        <label>DATA EDIÇÃO	</label>
                                        <input type="text" name="dataEdicao" value="<?= $consultaentrada['dataEdicao'] ?>" class="form-control">

                                        <label>USUARIO EDIÇÃO</label>
                                        <input type="text" name="usuarioEdicao" value="<?= $consultaentrada['usuarioEdicao'] ?>" class="form-control">

                                        
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