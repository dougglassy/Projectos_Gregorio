

<?php

session_start();
require 'dbcon.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os valores do formulário e converte para números
    $idproduto = (int)$_POST["numero"];
    $codigoproduto = $_POST["id"];
    $quantidade = (float)$_POST["quantidade"];
    $compra = (float)$_POST["compra"];
    $venda = (float)$_POST["preco"];
    $usuarioVenda = $_POST["usuario"];

    $total_quantidade_entrada = (int)$_POST["entradas"];
    $total_quantidade_saida = (int)$_POST["saidas"];

    // Realize os cálculos necessários
    $vendatotal = $quantidade * $venda;
    $lucro = $venda - $compra;
    $lucrototal = $quantidade * $lucro;


    $saldo = $total_quantidade_entrada - $total_quantidade_saida;


    $_POST["diferenca"] = (int)$saldo;

    if ($quantidade > $saldo || $saldo >= 0 ) {


        $_SESSION['message'] = "Dados Não Salvos, Saldo em Stoque Menor que o Pedido ";

        header("Location: formulariovendas.php");
        exit(0);
    } else {


        $query = "INSERT INTO saida (produtoid, codigoProduto, quantidades, compra, venda, lucro, lucroTotal, vendaTotal,  usuarioVenda) VALUES 
                        ( '$idproduto','$codigoproduto','$quantidade','$compra','$venda','$lucro','$lucrototal','$vendatotal','$usuarioVenda')";
        $queryyrun = mysqli_query($conn, $query);
        // Salve os dados em um banco de dados ou realize outras ações necessárias

        if ($queryyrun) {
            $_SESSION['message'] = "Dados Salvos com Sucesso";

            header("Location: formulariovendas.php");
            exit(0);
        } else {
        }
    }
}
