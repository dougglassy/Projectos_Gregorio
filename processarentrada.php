

<?php

session_start();
require 'dbcon.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os valores do formulário e converte para números
    $idproduto = (int)$_POST["numero"];
    $produtocodigo = $_POST["id"];
    $quantidadee = (float)$_POST["quantidadee"];
    $custoo = (float)$_POST["custoo"];
    $fornecedor = $_POST["fornecedor"];
    $factura = $_POST["factura"];
    $usuarioVenda = $_POST["usuarioo"];
     


        $query = "INSERT INTO entrada (idproduto, produtocodigo, quantidadee, custo, fornecedor, factura, usuarioEntrada) VALUES 
         ('$idproduto','$produtocodigo','$quantidadee','$custoo','$fornecedor','$factura','$usuarioVenda')";
        $queryyrun = mysqli_query($conn, $query);
        // Salve os dados em um banco de dados ou realize outras ações necessárias

        if ($queryyrun) {
            $_SESSION['message'] = "Dados Salvos com Sucesso";

            header("Location: formularioentradas.php");
            exit(0);
        } else {
        }
    }
