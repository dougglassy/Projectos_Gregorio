
<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o arquivo foi enviado sem erros
    if (isset($_FILES["arquivo"]) && $_FILES["arquivo"]["error"] == UPLOAD_ERR_OK) {
        $nome_arquivo = $_FILES["arquivo"]["name"];
        $caminho_temporario = $_FILES["arquivo"]["tmp_name"];

        // Conecta ao banco de dados MySQL
        $conexao = mysqli_connect("localhost", "dougglassy00", "D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(", "login_register");
        if (mysqli_connect_errno()) {
            die("Falha ao conectar ao banco de dados MySQL: " . mysqli_connect_error());
        }

        // Carrega a biblioteca PhpSpreadsheet
        require 'PhpSpreadsheet/vendor/autoload.php';

        // Cria um objeto do tipo Spreadsheet para ler o arquivo Excel
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $planilha = $reader->load($caminho_temporario);

        // Acessa a primeira planilha
        $planilha->setActiveSheetIndex(0);
        $dados = $planilha->getActiveSheet()->toArray();

        // Percorre as linhas da planilha e insere os dados na tabela MySQL
        foreach ($dados as $linha) {
            $valor = $linha[0]; // Supondo que os dados estejam na coluna A

            // Escapa o valor para evitar SQL injection (usando mysqli_real_escape_string)
            $valor = mysqli_real_escape_string($conexao, $valor);
            $valor1 = mysqli_real_escape_string($conexao, $valor1);
            $valor2 = mysqli_real_escape_string($conexao, $valor2);

            // Insere os dados na tabela MySQL
            $sql = "INSERT INTO php (a, b, c) VALUES ('$valor', '$valor1', '$valor2')";
            mysqli_query($conexao, $sql);
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conexao);

        // Mensagem de sucesso
        echo "Dados copiados com sucesso!";
    } else {
        echo "Erro no envio do arquivo.";
    }
}
?>



