<!DOCTYPE html>
<html>

<head>
    <title>Formulário de Vendas</title>
</head>

<body>
    <h1>Formulário de Vendas</h1>
    <form method="post" action="processar_venda.php">
        <label for="produto">Produto:</label>
        <input type="text" id="produto" name="produto" required>
        <br><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required>
        <br><br>

        <label for="preco">Preço Unitário:</label>
        <input type="number" step="0.01" id="preco" name="preco" required>
        <br><br>

        <label for="compra">Compra:</label>
        <input type="number" step="0.01" id="compra" name="compra" required>
        <br><br>

        <label for="data_hora">Data e Hora:</label>
        <input type="datetime-local" id="data_hora" name="data_hora" required>
        <br><br>


        <input type="submit" value="Enviar">
    </form>
</body>

</html>