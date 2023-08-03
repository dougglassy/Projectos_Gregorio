<!DOCTYPE html>
<html>

<head>
    <title>Pesquisa de Dados</title>
</head>

<body>
    <h1>Pesquisa de Dados</h1>
    <form>
        
        <label for="id">ID:</label>

        <select id="id" name="id" style="width: 100px;">
            <?php
            // Conexão com o banco de dados
            $conexao = mysqli_connect("localhost", "dougglassy00", "D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(", "login_register");

            // Verifica se a conexão foi estabelecida com sucesso
            if (mysqli_connect_errno()) {
                echo "Falha na conexão com o MySQL: " . mysqli_connect_error();
                exit();
            }

            // Consulta para obter os dados da tabela cidades
            $consulta = "SELECT codigo FROM produtos";
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
            <!-- Adicione mais opções conforme necessário -->

            <label for=" produto">Produto:</label>
            <input type="text" id="produto" class="form-control" readonly style="width: 350px;">
            <br>

            <label for="preco">Preço:</label>
            <input type="text" id="preco" class="form-control" readonly>



            <label for="compra">Compra:</label>
            <input type="text" id="compra" class="form-control" readonly>
            <br>

            <label for="qtd">Qtd:</label>
            <input type="text" id="qtd" class="form-control" readonly>


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
                            $('#codigo').val(result.codigo);
                            $('#produto').val(result.produto);
                            $('#preco').val(result.preco);
                            $('#compra').val(result.compra);
                        } else {
                            $('#produto').val('');
                            $('#qtd').val('');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>