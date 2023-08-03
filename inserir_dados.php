<?php
// Configurações do banco de dados MySQL
$servername = "localhost";
$username = "dougglassy00";
$password = "D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(";
$dbname = "login_register";

// Recebe os dados enviados pelo JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Conexão com o banco de dados usando PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Inserção dos dados na tabela do MySQL
    $stmt = $conn->prepare("INSERT INTO sua_tabela (coluna1, coluna2, coluna3) VALUES (:valor1, :valor2, :valor3)");

    foreach ($data as $row) {
        $stmt->bindParam(':valor1', $row['coluna1']);
        $stmt->bindParam(':valor2', $row['coluna2']);
        $stmt->bindParam(':valor3', $row['coluna3']);
        $stmt->execute();
    }

    $response = array('success' => true, 'message' => 'Dados importados com sucesso!');
    echo json_encode($response);
} catch (PDOException $e) {
    $response = array('success' => false, 'message' => 'Erro ao inserir os dados: ' . $e->getMessage());
    echo json_encode($response);
}
