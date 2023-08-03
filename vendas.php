<!doctype html>
<html lang="pt=br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sistema de Registro</title>
</head>


<body style="background-color: black;">

    <br> <br> <br>

    <div class="container mt-5">



        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">

                        <h4 style="text-align: center;">SISTEMA DE VENDAS

                            <a href="tabvendas.php" class="btn btn-danger float-end">VOLTAR</a>

                        </h4>

                    </div>

                    <div class="card-body" style="background-color: orange;width: 100%;">

                        <form action="processar_venda.php" method="POST">
                            <br><br><br>

                            <div class="mb-3">

                                <input type="hidden" id="numero" name="numero" class="d-inline" style="width: 80px;" readonly>
                            </div>

                            <div class="mb-3">

                                <label for="id">Codigo:</label>
                                <select name="id" id="id" class="d-inline" style="width: 150px; text-align: center;">
                                    <option value="apple">----Selecione----</option>

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
                                <input type="text" id="produto" name="produto" class="d-inline" style="width: 550px;text-align: center;" required>


                                <label for="quantidade">Quantidade:</label>
                                <input type="number" id="quantidade" name="quantidade" class="d-inline" style="width: 150px;text-align: center;" required>

                            </div>


                            <div class="mb-3">

                                <label for="preco">Preço Unitário:</label>
                                <input type="number" step="0.01" id="preco" name="preco" class="d-inline" style="width: 250px;text-align: center;" readonly>

                                <label for="compra">Compra:</label>
                                <input type="number" step="0.01" id="compra" name="compra" class="d-inline" style="width: 250px;text-align: center;" readonly>

                                <label for="data_hora">Data e Hora:</label>
                                <input type="datetime-local" id="data_hora" name="data_hora" class="d-inline" style="width: 250px;text-align: center;" required>

                            </div>


                            <div class="mb-3">

                                <button type="submit" name="Enviar" class="btn btn-primary">Realizar Venda</button>
                            </div>



                        </form>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#id').on('change', function() {
                                    var codigo = $(this).val();

                                    $.ajax({
                                        url: 'pesquisar_dados.php',
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