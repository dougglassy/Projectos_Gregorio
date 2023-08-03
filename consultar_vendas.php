<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "dougglassy00";
$password = "D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(";
$dbname = "login_register";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);


// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Recebe os valores das datas enviados pelo JavaScript
$datainicial = $_POST['datainicial'];
$datafinal = $_POST['datafinal'];

// Query SQL
$sql = "SELECT codigoProduto,        
	SUM(quantidades) AS quantidadeTotal, 
    SUM(lucroTotal) AS lucroTotal, 
    SUM(vendaTotal) AS vendaTotal 
    FROM saida 
    WHERE codigoProduto LIKE '%d%' AND dataVenda BETWEEN '$datainicial ' AND '$datafinal'
    GROUP BY codigoProduto 
    ORDER BY codigoProduto";


// Executa a consulta
$result = $conn->query($sql);

// Verifica se a consulta retornou resultados
if ($result->num_rows > 0) {
    // Loop para criar as linhas da tabela com os resultados
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td >" . $row["codigoProduto"] . "</td>";
        echo "<td>" . $row["quantidadeTotal"] . "</td>";
        echo "<td>" . $row["lucroTotal"] . "</td>";
        echo "<td>" . $row["vendaTotal"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>Nenhum resultado encontrado.</td></tr>";
}

// Fecha a conexão com o banco de dados
$conn->close();
