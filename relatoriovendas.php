<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="pt=br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Consulta de Vendas</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Estilize o elemento pai para controlar as barras de rolagem */
        .table table-borded table-striped {
            width: 300px;
            /* Defina a largura desejada */
            height: 100px;
            /* Defina a altura desejada */
            overflow: auto;
            /* Adicione barras de rolagem quando necessário */
        }

        /* Estilize a tabela e células conforme necessário */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>


<body style="background-color: black;">

    <div class="container mt-5">



        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">

                        <h4 style="text-align: center;">SISTEMA DE RELATÓRIO

                            <a href="formulariovendas.php" class="btn btn-danger float-end">VOLTAR</a>

                        </h4>

                    </div>

                    <div class="card-body" style="background-color: orange;width: 100%;">

                        <form action="">



                            <div class="mb-3">
                                <!-- 

                                <label for="preco">Preço Unitário:</label>
                                <input type="number" step="0.01" id="preco" name="preco" class="d-inline" style="width: 150px;text-align: center;" readonly>

                                -->

                                <!--  <label for="compra">Compra:</label> -->
                                <input type="hidden" step="0.01" id="compra" name="compra" class="d-inline" style="width: 250px;text-align: center;" readonly>

                                <!-- <label for="data_hora">Data e Hora:</label>-->
                                <input type="hidden" id="data_hora" name="data_hora" class="d-inline" style="width: 250px;text-align: center;">

                            </div>




                            <div class="mb-3">

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <label for="datainicial">Data Inicial:</label>
                                &nbsp;&nbsp;
                                <select name="datainicial" id="datainicial" class="d-inline" style="width: 250px; text-align: center;">
                                    <option value="apple">--Data inicial--</option>

                                    <?php
                                    // Conexão com o banco de dados
                                    $conexao = mysqli_connect("localhost", "dougglassy00", "D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(", "login_register");

                                    // Verifica se a conexão foi estabelecida com sucesso
                                    if (mysqli_connect_errno()) {
                                        echo "Falha na conexão com o MySQL: " . mysqli_connect_error();
                                        exit();
                                    }

                                    // Consulta para obter os dados da tabela cidades
                                    $consulta = "SELECT dataVenda FROM saida";
                                    $resultado = mysqli_query($conexao, $consulta);

                                    // Verifica se a consulta retornou algum resultado
                                    if (mysqli_num_rows($resultado) > 0) {
                                        // Loop para gerar as opções da caixa de combinação
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            echo '<option value="' . $row['dataVenda'] . '">' . $row['dataVenda'] . '</option>';
                                        }
                                    }

                                    // Fechar a conexão com o banco de dados
                                    mysqli_close($conexao);
                                    ?>

                                </select>
                                &nbsp;&nbsp;

                                <label for="datafinal">Data final:</label>
                                &nbsp;&nbsp;
                                <select name="datafinal" id="datafinal" class="d-inline" style="width: 250px; text-align: center;">
                                    <option value="apple">--Data Final--</option>

                                    <?php
                                    // Conexão com o banco de dados
                                    $conexao = mysqli_connect("localhost", "dougglassy00", "D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(", "login_register");

                                    // Verifica se a conexão foi estabelecida com sucesso
                                    if (mysqli_connect_errno()) {
                                        echo "Falha na conexão com o MySQL: " . mysqli_connect_error();
                                        exit();
                                    }

                                    // Consulta para obter os dados da tabela cidades
                                    $consulta = "SELECT dataVenda FROM saida";
                                    $resultado = mysqli_query($conexao, $consulta);

                                    // Verifica se a consulta retornou algum resultado
                                    if (mysqli_num_rows($resultado) > 0) {
                                        // Loop para gerar as opções da caixa de combinação
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            echo '<option value="' . $row['dataVenda'] . '">' . $row['dataVenda'] . '</option>';
                                        }
                                    }

                                    // Fechar a conexão com o banco de dados
                                    mysqli_close($conexao);
                                    ?>

                                </select>

                            </div>



                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="container ">

        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 100%;">
                    <div class="card-header">

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button id="btn-consultar">Relatório de Vendas</button>
                        <table id="tabela-vendas">


                    </div>
                    <div class="card-body">
                        <table id="tabela-vendas" class="table table-borded table-striped">
                            <thead>
                                <tr>

                                    <th style="text-align: center;">CÓDIGO</th>
                                    <th style="text-align: center;">QUANTIDADE TOTAL</th>
                                    <th style="text-align: center;">TOTAL DE LUCRO</th>
                                    <th style="text-align: center;">TOTAL DE VENDA</th>

                                    <!--  
                                         <th style="text-align: center;">AÇÕES</th>
                                  -->


                                </tr>
                            </thead>

                            <tbody style="border-color: red;">


                            </tbody>
                        </table>



                        <script>
                            $(document).ready(function() {
                                // Captura o clique do botão "Consultar Vendas"
                                $("#btn-consultar").on("click", function() {
                                    // Captura os valores das datas dos campos de texto
                                    var datainicial = $("#datainicial").val();
                                    var datafinal = $("#datafinal").val();

                                    // Envia uma requisição AJAX para o arquivo PHP que faz a consulta
                                    $.ajax({
                                        url: "consultar_vendas.php",
                                        type: "POST",
                                        data: {
                                            datainicial: datainicial,
                                            datafinal: datafinal
                                        },
                                        success: function(data) {
                                            // Remove as linhas existentes na tabela
                                            $("#tabela-vendas tbody").empty();
                                            // Adiciona as novas linhas com os dados retornados pelo PHP
                                            $("#tabela-vendas tbody").append(data);
                                        },
                                        error: function() {
                                            alert("Erro ao consultar vendas.");
                                        }
                                    });
                                });
                            });
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <br> <br> <br>


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