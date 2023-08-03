<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "dougglassy00";
$password = "D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(";
$dbname = "login_register";

try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>