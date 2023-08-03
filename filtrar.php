<?php
require 'dbcon.php';

// Verifica se o formulário foi enviado
if (isset($_POST['datainicial']) && isset($_POST['datafinal'])) {
    $datainicial = $_POST['datainicial'];
    $datafinal = $_POST['datafinal'];

    $query = "SELECT codigoProduto,        
                    SUM(quantidade) AS quantidadeTotal, 
                    SUM(lucroTotal) AS lucroTotal, 
                    SUM(vendaTotal) AS vendaTotal 
                    FROM saida 
                    WHERE codigoProduto LIKE '%d%' AND timestamp BETWEEN '$datainicial' AND '$datafinal'
                    GROUP BY codigoProduto 
                    ORDER BY codigoProduto";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['message'] = "Dados Salvos com Sucesso";
        header("Location: formTab.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Dados Não Salvos";
        header("Location: formTab.php");
        exit(0);
    }
}
