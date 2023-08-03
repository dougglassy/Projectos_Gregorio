
<?php
require 'PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Configurações do banco de dados
$servername = "localhost";
$username = "dougglassy00";
$password = "D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(";
$dbname = "login_register";

// Caminho para o arquivo Excel que será importado
$arquivo_excel = 'C:/Users/M&A ASAS/Documents/php.xlsx';


try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Carregar o arquivo Excel
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($arquivo_excel);
    $worksheet = $spreadsheet->getActiveSheet();

    // Inicializar a consulta SQL
    $sql = "INSERT INTO php (a, b, c) VALUES ";

    // Iterar pelas linhas do Excel e construir a consulta SQL
    $firstRow = true;
    foreach ($worksheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(FALSE);

        $data = array();
        foreach ($cellIterator as $cell) {
            $data[] = $cell->getValue();
        }

        // Se não for a primeira linha, adicionar uma vírgula antes dos valores
        if (!$firstRow) {
            $sql .= ",";
        }

        // Adicionar os valores à consulta SQL
        $sql .= "('" . implode("','", $data) . "')";

        $firstRow = false;
    }

    // Executar a consulta SQL
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo "Dados importados com sucesso!";
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
} catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $ex) {
    echo "Erro ao ler o arquivo Excel: " . $ex->getMessage();
} catch (Exception $ex) {
    echo "Erro ao importar os dados: " . $ex->getMessage();
}
?>