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

                            $idsaidas = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM saida where id='$idsaidas' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {

                                $consultavendas = mysqli_fetch_array($query_run);
                        ?>



                                <form action="operacoesvendas.php" method="POST">


                                    <input type="hidden" name="id" value="<?= $consultavendas['id'] ?>">


                                    <div class="mb-3">

                                        <label>ID PRODUTO</label>
                                        <input type="number" name="produtoid" value="<?= $consultavendas['produtoid'] ?>" class="form-control" readonly>

                                        <label>CODIGO</label>
                                        <input type="text" name="codigoProduto" value="<?= $consultavendas['codigoProduto'] ?>" class="form-control" readonly>

                                        <label>QTD</label>
                                        <input type="number" name="quantidades" value="<?= $consultavendas['quantidades'] ?>" class="form-control">

                                        <label>COMPRA</label>
                                        <input type="number" name="compra" value="<?= $consultavendas['compra'] ?>" class="form-control">


                                    </div>

                                    <div class="mb-3">

                                        <label>VENDA</label>
                                        <input type="number" name="venda" value="<?= $consultavendas['venda'] ?>" class="form-control">

                                        <label>LUCRO PARCIAL</label>
                                        <input type="number" name="lucro" value="<?= $consultavendas['lucro'] ?>" class="form-control">

                                        <label>LUCRO TOTAL</label>
                                        <input type="number" name="lucroTotal" value="<?= $consultavendas['lucroTotal'] ?>" class="form-control">

                                        <label>VENDA TOTAL</label>
                                        <input type="number" name="vendaTotal" value="<?= $consultavendas['vendaTotal'] ?>" class="form-control">

                                    </div>

                                    <div class="mb-3">

                                        <label>DATA VENDA</label>
                                        <input type="text" name="dataVenda" value="<?= $consultavendas['dataVenda'] ?>" class="form-control">

                                        <label>USUARIO VENDA</label>
                                        <input type="text" name="usuarioVenda" value="<?= $consultavendas['usuarioVenda'] ?>" class="form-control">

                                        <label>DATA EDIÇÃO</label>
                                        <input type="datetime-local" name="dataAlteracao" value="<?= $consultavendas['dataAlteracao'] ?>" class="form-control">

                                        <label>USUARIO EDIÇÃO</label>
                                        <input type="text" name="usuarioAlteracao" value="<?= $consultavendas['usuarioAlteracao'] ?>" class="form-control">


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