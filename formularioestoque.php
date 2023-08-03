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

    <title>Relatório do Estoque</title>


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


                        <h4 style="text-align: center;">
                            Relatório do Estoque

                        </h4>

                    </div>

                    <div class="card-body" style="background-color: orange;width: 100%;">
                        <div class="mb-3">


                            <input type="text" id="dataHoraAtual" name="dataHoraAtual" style="text-align: center;" class="form-control" readonly>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="container ">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 100%;">
                    <div class="card-header">


                        <h4 style="text-align: center;">SITUAÇÃO DO ESTOQUE

                            <!--mt-5 espaçamencto
                            -->
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borded table-striped">
                            <thead>
                                <tr>

                                    <th style="text-align: center;">ID</th>
                                    <th style="text-align: center;">CÓDIGO</th>
                                    <th style="text-align: center;">PROTDUTO</th>
                                    <th style="text-align: center;">TOTAL_ENTRADA</th>
                                    <th style="text-align: center;">TOTAL_SAIDA</th>
                                    <th style="text-align: center;">SALDO</th>


                                    <!--  
                                         <th style="text-align: center;">AÇÕES</th>
                                  -->


                                </tr>
                            </thead>

                            <tbody style="border-color: red;">
                                <?php


                                //$query = "SELECT codigoProduto, SUM(quantidade) AS quantidadeTotal,  SUM(lucroTotal) AS lucroTotal, SUM(vendaTotal) AS vendaTotal FROM saida WHERE codigoProduto LIKE '%d%' GROUP BY codigoProduto ORDER BY codigoProduto":
                                $query = "SELECT p.ID, p.PRODUTO, e.PRODUTOCODIGO,  
                                        SUM(e.quantidadee) AS TOTAL_ENTREDA, SUM(s.quantidades) AS TOTAL_SAIDA,  
                                        SUM(s.compra) AS TOTAL_COMPRAS,
                                        SUM(e.quantidadee) AS TOTAL_ENTREDA, SUM(s.quantidades) AS TOTAL_SAIDA,  
                                         (SUM(e.quantidadee) - SUM(s.quantidades)) AS SALDO
                                        FROM produto p
                                        INNER JOIN entrada e ON p.id = e.idproduto
                                        INNER JOIN saida s ON p.id = s.produtoid
                                        GROUP BY p.id, p.produto, e.produtocodigo, e.quantidadee, s.compra";

                                $queryruUn = mysqli_query($conn, $query);

                                if (mysqli_num_rows($queryruUn) > 0) {
                                    foreach ($queryruUn as $entradas) {
                                ?>

                                        <tr>


                                            <td style="text-align: center;"><?= $entradas['ID']; ?></td>
                                            <td style="text-align: center;"><?= $entradas['PRODUTOCODIGO']; ?></td>
                                            <td style="text-align: center;"><?= $entradas['PRODUTO']; ?></td>
                                            <td style="text-align: center;"><?= $entradas['TOTAL_ENTREDA']; ?></td>
                                            <td style="text-align: center;"><?= $entradas['TOTAL_SAIDA']; ?></td>
                                            <td style="text-align: center;"><?= $entradas['SALDO']; ?></td>


                                        </tr>

                                <?php


                                    }
                                } else {

                                    echo "<h5>Nenhum Registro Encontrado</h5>";
                                }
                                ?>

                            </tbody>

                        </table>
                        <a href="PhpSpreadsheet/gerarestoqueExcel.php" class="btn btn-info float-home">Relatório EXECEL</a>
                        <a href="gerarPDFestoq.php" class="btn btn-info float-home">Relatório PDF</a>
                        <a href="formularioentradas.php" class="btn btn-danger float-end">VOLTAR</a>


                    </div>
                </div>
            </div>

            <script>
                // Função para formatar o número com zero à esquerda se for menor que 10
                function formatNumber(number) {
                    return number < 10 ? "0" + number : number;
                }

                // Função para atualizar o campo de texto com a data e hora atual
                function exibirDataHoraAtual() {
                    const campoDataHora = document.getElementById("dataHoraAtual");

                    const dataAtual = new Date();
                    const dia = formatNumber(dataAtual.getDate());
                    const mes = formatNumber(dataAtual.getMonth() + 1);
                    const ano = dataAtual.getFullYear();
                    const hora = formatNumber(dataAtual.getHours());
                    const minutos = formatNumber(dataAtual.getMinutes());
                    const segundos = formatNumber(dataAtual.getSeconds());

                    const dataHoraFormatada = `${dia}/${mes}/${ano} ${hora}:${minutos}:${segundos}`;
                    campoDataHora.value = dataHoraFormatada;
                }

                // Chama a função para exibir a data e hora atual imediatamente ao carregar a página
                exibirDataHoraAtual();

                // Configura o intervalo para atualizar a data e hora a cada segundo (1000 milissegundos)
                setInterval(exibirDataHoraAtual, 1000);
            </script>

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