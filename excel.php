<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "dougglassy00";
$password = "D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(";
$dbname = "login_register";

// Incluir a biblioteca PhpSpreadsheet

require_once('PhpSpreadsheet/vendor/autoload.php');



try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL com a coluna de saldo
    $sql = "SELECT p.ID, p.PRODUTO, e.PRODUTOCODIGO,  
            SUM(e.quantidadee) AS TOTAL_ENTRADA, SUM(s.quantidades) AS TOTAL_SAIDA,  
            (SUM(e.quantidadee) - SUM(s.quantidades)) AS SALDO
            FROM produto p
            INNER JOIN entrada e ON p.id = e.idproduto
            INNER JOIN saida s ON p.id = s.produtoid
            GROUP BY p.id, p.produto, e.produtocodigo";

    // Execução da consulta
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Criação do objeto Spreadsheet
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Escrever os cabeçalhos na primeira linha
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Produto');
    $sheet->setCellValue('C1', 'Produto Código');
    $sheet->setCellValue('D1', 'Total de Entrada');
    $sheet->setCellValue('E1', 'Total de Saída');
    $sheet->setCellValue('F1', 'Saldo');

    // Escrever os dados na planilha
    $row = 2;
    foreach ($result as $data) {
        $sheet->setCellValue('A' . $row, $data['ID']);
        $sheet->setCellValue('B' . $row, $data['PRODUTO']);
        $sheet->setCellValue('C' . $row, $data['PRODUTOCODIGO']);
        $sheet->setCellValue('D' . $row, $data['TOTAL_ENTRADA']);
        $sheet->setCellValue('E' . $row, $data['TOTAL_SAIDA']);
        $sheet->setCellValue('F' . $row, $data['SALDO']);
        $row++;
    }

    // Configurar o cabeçalho do arquivo
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="relatorio_estoque.xlsx"');
    header('Cache-Control: max-age=0');

    // Salvar o arquivo Excel
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
