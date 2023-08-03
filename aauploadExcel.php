<!DOCTYPE html>
<html>

<head>
    <title>Upload de Tabela Excel</title>
</head>

<body>
    <h2>Envie um arquivo Excel para copiar dados para a tabela MySQL</h2>
    <form action="processar_upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="arquivo" id="arquivo" accept=".xls, .xlsx">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>