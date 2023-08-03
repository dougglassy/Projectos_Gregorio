<?php

require 'dbcon.php';
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os valores do formulário
    $produto = $_POST["produto"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];
    $compra = $_POST["compra"];
    $MODIFICADA = $_POST['data_hora'];

    // Realize os cálculos necessários
    $subtotal = $quantidade * $preco;
    $impostos = $subtotal * 0.1; // Exemplo de cálculo de impostos de 10%
    $total = $subtotal + $impostos;
    $lucro = $preco - $compra ;
    $lucrototal = $quantidade * $lucro;



    $query = "INSERT INTO vendas (PRODUTO, QTD, PRECO, SUBTOTAL, IMPOSTO, TOTAL, LUCRO, LUCROTOTAL, MODIFICADA) VALUES 
            ( '$produto','$quantidade','$preco','$subtotal','$impostos','$total','$lucro','$lucrototal','$MODIFICADA')";
    $query_run = mysqli_query($conn, $query);
    // Salve os dados em um banco de dados ou realize outras ações necessárias
    header("Location: formTab.php");
    
}

