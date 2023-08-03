<!DOCTYPE html>
<html>

<head>
    <title>Upload de Tabela Excel</title>
</head>

<body>
    <h2>Envie um arquivo Excel para copiar dados para a tabela MySQL</h2>
    <form action="ProcessarUploadExcel.php" method="post" enctype="multipart/form-data">
        <input type="file" name="arquivo" id="arquivo" accept=".xls, .xlsx">
        <p>Selecione a tabela do banco de dados:</p>
        <select name="tabela">
            <option value="php">php</option>
            <option value="php">php</option>
            <!-- Adicione mais opções de tabelas conforme necessário -->
        </select>
        <p>Informe o mapeamento das colunas:</p>
        <label>Coluna A (Excel) - <input type="text" name="a"></label><br>
        <label>Coluna B (Excel) - <input type="text" name="b"></label><br>
        <label>Coluna C (Excel) - <input type="text" name="c"></label><br>
        <!-- Adicione mais campos de mapeamento conforme necessário -->
        <input type="submit" value="Enviar">
    </form>
</body>

</html>