<?php
// Configurações do banco de dados


require_once('dbbcon.php');
require_once('TCPD/tcpdf.php');


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

// Criação do PDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Define informações do documento PDF
$pdf->SetCreator('DOGLASE');
$pdf->SetAuthor('GREGORIO FONSECA');
$pdf->SetTitle('RELATORIO DE ESTOQUE');
$pdf->SetSubject('Tabela de Produtos');
$pdf->SetKeywords('PDF, RELARORIO, ESTOQUE');


// Configuração do cabeçalho
// Insira o caminho correto para a imagem do logotipo
$logo_path = 'images/img.PNG';
$pdf->SetHeaderData($logo_path, 30, 'RELATÓRIO DE ESTOQUE', 'Empresa ABC', array(0, 0, 0), array(255, 255, 255));
$pdf->setHeaderFont(array('helvetica', '', 10));
$pdf->setFooterFont(array('helvetica', '', 8));
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(10);

// Configuração do rodapé
$pdf->setFooterData(array(0, 0, 0), array(255, 255, 255));


// Cria uma nova página
$pdf->AddPage();

// Criação da tabela no PDF
$html = '<table border="1">';
$html .= '<tr><th>ID</th><th>Produto</th><th>Produto Código</th><th>Total de Entrada</th><th>Total de Saída</th><th>Saldo</th></tr>';

foreach ($result as $row) {
    $html .= '<tr>';
    $html .= '<td>' . $row['ID'] . '</td>';
    $html .= '<td>' . $row['PRODUTO'] . '</td>';
    $html .= '<td>' . $row['PRODUTOCODIGO'] . '</td>';
    $html .= '<td>' . $row['TOTAL_ENTRADA'] . '</td>';
    $html .= '<td>' . $row['TOTAL_SAIDA'] . '</td>';
    $html .= '<td>' . $row['SALDO'] . '</td>';
    $html .= '</tr>';
}

$html .= '</table>';

// Escreve o conteúdo da tabela no PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Renderiza o PDF
$pdf->Output('tabela_produtos.pdf', 'I'); // 'I' para visualização no navegador, 'D' para download
