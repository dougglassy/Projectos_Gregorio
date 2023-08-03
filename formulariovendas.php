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

    <title>Cadastro de Saidas</title>

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

                        <h4 style="text-align: center;">SISTEMA DE VENDAS



                            <a href="relatoriovendas.php" class="btn btn-danger float-end">VOLTAR</a>

                        </h4>

                    </div>

                    <div class="card-body" style="background-color: orange;width: 100%;">

                        <form action="processarsaida.php" method="POST">
                            <br><br><br>

                            <div class="mb-3">

                                <input type="hidden" id="numero" name="numero" class="d-inline" style="width: 80px;" readonly>
                                <input type="hidden" id="usuario" name="usuario" value="convidado" class="d-inline" style="width: 80px;" readonly>


                            </div>


                            <div class="mb-3">

                                <label for="id">Codigo:</label>
                                <select name="id" id="id" class="d-inline" style="width: 150px; text-align: center;">
                                    <option value="apple">--Selecione Aqui--</option>

                                    <?php
                                    // Conexão com o banco de dados
                                    $conexao = mysqli_connect("localhost", "dougglassy00", "D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(", "login_register");

                                    // Verifica se a conexão foi estabelecida com sucesso
                                    if (mysqli_connect_errno()) {
                                        echo "Falha na conexão com o MySQL: " . mysqli_connect_error();
                                        exit();
                                    }

                                    // Consulta para obter os dados da tabela cidades
                                    $consulta = "SELECT codigo FROM produto";
                                    $resultado = mysqli_query($conexao, $consulta);

                                    // Verifica se a consulta retornou algum resultado
                                    if (mysqli_num_rows($resultado) > 0) {
                                        // Loop para gerar as opções da caixa de combinação
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            echo '<option value="' . $row['codigo'] . '">' . $row['codigo'] . '</option>';
                                        }
                                    }

                                    // Fechar a conexão com o banco de dados
                                    mysqli_close($conexao);
                                    ?>

                                </select>

                                <label for="produto">Produto:</label>
                                <input type="text" id="produto" name="produto" class="d-inline" style="width: 470px;text-align: center;" required>


                                <label for="quantidade">Quantidade:</label>
                                <input type="number" step="0" id="quantidade" name="quantidade" class="d-inline" style="width: 150px;text-align: center;" required>

                                <label for="preco">Preço Unitário:</label>
                                <input type="number" step="0.01" id="preco" name="preco" class="d-inline" style="width: 150px;text-align: center;" readonly>

                            </div>


                            <div class="mb-3">
                                <!-- 

                                <label for="preco">Preço Unitário:</label>
                                <input type="number" step="0.01" id="preco" name="preco" class="d-inline" style="width: 150px;text-align: center;" readonly>

                                

                                -->
                                <label for="diferenca">Saldo Disponivel:</label>
                                <input type="number" step="0" id="" name="diferenca" class="d-inline" style="width: 150px;text-align: center;" readonly>

                                <label for="entradas">Entradas:</label>
                                <input type="number" step="0" id="entradas" name="entradas" class="d-inline" style="width: 150px;text-align: center;" readonly>

                                <label for="saidas">Saidas:</label>
                                <input type="number" step="0" id="saidas" name="saidas" class="d-inline" style="width: 150px;text-align: center;" readonly>

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
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;

                                <button type="submit" name="Enviar" class="btn btn-primary">Realizar Venda</button>

                            </div>

                        </form>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#id').on('change', function() {
                                    var codigo = $(this).val();

                                    $.ajax({
                                        url: 'careragarPreco.php',
                                        type: 'POST',
                                        data: {
                                            codigo: codigo
                                        },
                                        success: function(data) {
                                            var result = JSON.parse(data);

                                            if (result) {


                                                $('#numero').val(result.id);
                                                $('#produto').val(result.produto);
                                                $('#compra').val(result.compra);
                                                $('#preco').val(result.venda);
                                            } else {
                                                $('#produto').val('');
                                                $('#qtd').val('');
                                            }
                                        }
                                    });
                                });
                            });
                        </script>


                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <script>
                            $(document).ready(function() {
                                $('#id').on('change', function() {
                                    var codigo = $(this).val();

                                    $.ajax({
                                        url: 'somarentradas.php',
                                        type: 'POST',
                                        data: {
                                            codigo: codigo
                                        },
                                        success: function(data) {
                                            var result = JSON.parse(data);

                                            if (result) {


                                                $('#entradas').val(result.quantidadeTotal);


                                            } else {
                                                $('#entradas').val('0');

                                            }
                                        }
                                    });
                                });
                            });
                        </script>



                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#id').on('change', function() {
                                    var codigo = $(this).val();

                                    $.ajax({
                                        url: 'somarsaidas.php',
                                        type: 'POST',
                                        data: {
                                            codigo: codigo
                                        },
                                        success: function(data) {
                                            var result = JSON.parse(data);

                                            if (result) {


                                                $('#saidas').val(result.quantidadeTotal);


                                            } else {
                                                $('#saidas').val('0');
                                            }
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



    <div class="container ">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">

                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h4 style="text-align: center;">Tabela de Saidas
                            <a href="relatoriovendas.php" class="btn btn-primary float-end">Fazer Relatório</a>
                            <!--mt-5 espaçamencto
                            -->
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borded table-striped">
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
                                <?php


                                //$query = "SELECT codigoProduto, SUM(quantidade) AS quantidadeTotal,  SUM(lucroTotal) AS lucroTotal, SUM(vendaTotal) AS vendaTotal FROM saida WHERE codigoProduto LIKE '%d%' GROUP BY codigoProduto ORDER BY codigoProduto":
                                $query = "SELECT codigoProduto, 
                                        SUM(quantidades) AS quantidadeTotal, 
                                        SUM(lucroTotal) AS lucroTotal, 
                                        SUM(vendaTotal) AS vendaTotal 
                                FROM saida 
                                WHERE codigoProduto LIKE '%d%' 
                                GROUP BY codigoProduto 
                                ORDER BY codigoProduto";

                                //"SELECT * FROM saida ORDER BY id DESC";
                                $queryrun = mysqli_query($conn, $query);

                                if (mysqli_num_rows($queryrun) > 0) {
                                    foreach ($queryrun as $vendas) {
                                ?>

                                        <tr>

                                            <!--

                                                

                                                <td><?= $vendas['produtoid']; ?></td>
                                                <td><?= $vendas['compra']; ?></td>
                                                <td><?= $vendas['lucro']; ?></td>
                                                

                                                <td><?= $vendas['dataAlteracao']; ?></td>
                                            <td><?= $vendas['usuarioAlteracao']; ?></td>
                                            -->

                                            <td style="text-align: center;"><?= $vendas['codigoProduto']; ?></td>
                                            <td style="text-align: center;"><?= $vendas['quantidadeTotal']; ?></td>
                                            <td style="text-align: center;"><?= $vendas['lucroTotal']; ?></td>
                                            <td style="text-align: center;"><?= $vendas['vendaTotal']; ?></td>




                                            <!--
                                                <td>
                                                <a href="visualisar.php?id=<?= $usuarios['id']; ?>" class="btn btn-info btn-sm" style="text-align: center;">Ver</a>
                                                <a href="editar.php?id=<?= $usuarios['id']; ?>" class="btn btn-success btn-sm" style="text-align: center;">Editar</a>

                                                <form action="operacoes.php" method="POST" class="d-inline">

                                                    <button type="submit" name="excluir" value="<?= $usuarios['id']; ?>" class="btn btn-danger btn-sm" style="text-align: center;">Excluir</button>

                                                </form>

                                            </td>
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