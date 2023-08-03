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

                            <a href="gestaovendas.php" class="btn btn-danger float-end">GESTÃO</a>

                        </h4>

                    </div>

                    <div class="card-body">

                        <?php


                        if (isset($_GET['id'])) {

                            $identradas = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM entrada where id='$identradas' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {

                                $consultaentradas = mysqli_fetch_array($query_run);
                        ?>



                                <form action="operacoesentradas.php" method="POST">


                                    <input type="hidden" name="id" value="<?= $consultaentradas['id'] ?>">


                                    <div class="mb-3">

                                        <label>ID PRODUTO</label>
                                        <input type="number" name="idproduto" value="<?= $consultaentradas['idproduto'] ?>" class="form-control" readonly>

                                        <label>CODIGO</label>
                                        <input type="text" name="produtocodigo" value="<?= $consultaentradas['produtocodigo'] ?>" class="form-control" readonly>

                                        <label>QTD</label>
                                        <input type="number" name="quantidadee" value="<?= $consultaentradas['quantidadee'] ?>" class="form-control">

                                        <label>CUSTO</label>
                                        <input type="number" name="custo" value="<?= $consultaentradas['custo'] ?>" class="form-control">


                                    </div>

                                    <div class="mb-3">

                                        <label>FORNECEDOR</label>
                                        <input type="text" name="fornecedor" value="<?= $consultaentradas['fornecedor'] ?>" class="form-control">

                                        <label>FACTURA</label>
                                        <input type="text" name="factura" value="<?= $consultaentradas['factura'] ?>" class="form-control">

                                        <label>DATA ENTRADA</label>
                                        <input type="text" name="dataEntrada" value="<?= $consultaentradas['dataEntrada'] ?>" class="form-control">

                                        <label>USUARIO VENDA</label>
                                        <input type="text" name="usuarioEntrada" value="<?= $consultaentradas['usuarioEntrada'] ?>" class="form-control">

                                    </div>

                                    <div class="mb-3">


                                        <label>DATA EDIÇÃO</label>
                                        <input type="datetime-local" name="dataEdicao" value="<?= $consultaentradas['dataEdicao'] ?>" class="form-control">

                                        <label>USUARIO EDIÇÃO</label>
                                        <input type="text" name="usuarioEdicao" value="<?= $consultaentradas['usuarioEdicao'] ?>" class="form-control">


                                    </div>


                                    <div class="mb-3">

                                        <button type="submit" name="update" class="btn btn-success">Actualizar dados da Venda</button>
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