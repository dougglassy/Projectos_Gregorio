<?php
// Conexão com o banco de dados
$host = 'localhost';
$usuario = 'dougglassy00';
$senha = 'D@L2$337M&L!D()G73G*7Y0V05*Qdl*PYxuOab(';
$banco = 'login_register';

$conexao = mysqli_connect($host, $usuario, $senha, $banco);
if (!$conexao) {
    die('Erro na conexão com o banco de dados: ' . mysqli_connect_error());
}

// Obtendo o valor do ID enviado via AJAX
$entradas = $_POST['codigo'];

// Consulta SQL para pesquisar dados na tabela
$query = "SELECT produtocodigo, 
SUM(quantidadee) AS quantidadeTotal
FROM entrada 
WHERE produtocodigo = '$entradas' 
GROUP BY produtocodigo 
ORDER BY produtocodigo";
$resultado = mysqli_query($conexao, $query);

// Verificando se a consulta retornou resultados
if ($resultado && mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    echo json_encode($row);
} else {
    echo json_encode(null);
}

// Fechando a conexão com o banco de dados
mysqli_close($conexao);
