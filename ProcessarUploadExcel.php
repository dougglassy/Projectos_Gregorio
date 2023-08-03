<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["arquivo"]) && $_FILES["arquivo"]["error"] == UPLOAD_ERR_OK) {
        $tabela = $_POST["tabela"];
        $coluna_a_bd = $_POST["a"];
        $coluna_b_bd = $_POST["b"];
        $coluna_c_bd = $_POST["c"];
        // Adicione mais variáveis para as outras colunas, caso necessário.

        // Conecta ao banco de dados MySQL
        // $conexao = mysqli_connect("localhost", "usuario", "senha", "nome_do_banco");
        require_once('dbconExcel.php');
        //$conexao = mysqli_connect("localhost", "dougglassy00", "D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(", "login_register");
        if (mysqli_connect_errno()) {
            die("Falha ao conectar ao banco de dados MySQL: " . mysqli_connect_error());
        }

        // Carrega a biblioteca PhpSpreadsheet
        require 'PhpSpreadsheet/vendor/autoload.php';

        // Cria um objeto do tipo Spreadsheet para ler o arquivo Excel
        $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $planilha = $reader->load($_FILES["arquivo"]["tmp_name"]);

        // Acessa a primeira planilha
        $planilha->setActiveSheetIndex(0);
        $dados = $planilha->getActiveSheet()->toArray();

        // Percorre as linhas da planilha e insere os dados na tabela MySQL
        foreach ($dados as $linha) {
            $valor_coluna_a = $linha[0]; // Supondo que os dados estejam na coluna A
            $valor_coluna_b = $linha[1]; // Supondo que os dados estejam na coluna B
            $valor_coluna_c = $linha[2]; // Supondo que os dados estejam na coluna C
            // Adicione mais linhas para outras colunas, conforme necessário.

            // Escapa os valores para evitar SQL injection (usando mysqli_real_escape_string)
            $valor_coluna_a = mysqli_real_escape_string($conexao, $valor_coluna_a);
            $valor_coluna_b = mysqli_real_escape_string($conexao, $valor_coluna_b);
            $valor_coluna_c = mysqli_real_escape_string($conexao, $valor_coluna_c);
            // Adicione mais linhas para outras colunas, conforme necessário.

            // Insere os dados na tabela MySQL
            $sql = "INSERT INTO $tabela ($coluna_a_bd, $coluna_b_bd, $coluna_c_bd) VALUES ('$valor_coluna_a', '$valor_coluna_b', '$valor_coluna_c')";
            mysqli_query($conexao, $sql);
        }

        mysqli_close($conexao);

        // Mensagem de sucesso
        echo "Dados copiados com sucesso!";
    } else {
        echo "Erro no envio do arquivo.";
    }
}
