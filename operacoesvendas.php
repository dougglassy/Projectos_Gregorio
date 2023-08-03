<?php
session_start();
require 'dbcon.php';


if(isset($_POST['excluir']))
{

    $idvendas = mysqli_real_escape_string($conn, $_POST['excluir']);
     $query = "DELETE FROM saida WHERE id='$idvendas' ";
    $query_run = mysqli_query($conn, $query);


    if ($query_run) {


        $_SESSION['message'] = "Dados Excluidos com Sucesso";

        header("Location: gestaovendas.php");
        exit(0);
    } else {


        $_SESSION['message'] = "Falha na Exclusao ";

        header("Location: gestaovendas.php");
        exit(0);
    }



}


if(isset($_POST['update']))

{
    $idvendas = mysqli_real_escape_string($conn, $_POST['id']);
    $produtoid = mysqli_real_escape_string($conn, $_POST['produtoid']);
    $codigoProduto = mysqli_real_escape_string($conn, $_POST['codigoProduto']);
    $quantidades = mysqli_real_escape_string($conn, $_POST['quantidades']);
    $compra = mysqli_real_escape_string($conn, $_POST['compra']);
    $venda = mysqli_real_escape_string($conn, $_POST['venda']);
    $lucro = mysqli_real_escape_string($conn, $_POST['lucro']);
    $lucroTotal = mysqli_real_escape_string($conn, $_POST['lucroTotal']);
    $vendaTotal = mysqli_real_escape_string($conn, $_POST['vendaTotal']);
    $dataVenda = mysqli_real_escape_string($conn, $_POST['dataVenda']);
    $usuarioVenda = mysqli_real_escape_string($conn, $_POST['usuarioVenda']);
    $dataAlteracao = mysqli_real_escape_string($conn, $_POST['dataAlteracao']);
    $usuarioAlteracao = mysqli_real_escape_string($conn, $_POST['usuarioAlteracao']);
   


    $query = "UPDATE saida SET  produtoid='$produtoid', codigoProduto='$codigoProduto', quantidades='$quantidades', compra='$compra', venda='$venda', lucro='$lucro', lucroTotal='$lucroTotal', vendaTotal='$vendaTotal', dataVenda='$dataVenda', usuarioVenda='$usuarioVenda', dataAlteracao='$dataAlteracao', usuarioAlteracao='$usuarioAlteracao' WHERE id='$idvendas' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){


        $_SESSION['message'] = "Dados Actualizados com Sucesso";

        header("Location: gestaovendas.php");
        exit(0);



    }
    else{


        $_SESSION['message'] = "Falha na Edição ";

        header("Location: gestaovendas.php");
        exit(0);



    }


}


if(isset($_POST['save'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "INSERT INTO users (fullname, email, password) VALUES 
            ( '$name','$email','$password')";
    $query_run = mysqli_query($conn,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Dados Salvos com Sucesso";

        header("Location: cadastro.php");
        exit(0);

    }
    else{

        $_SESSION['message'] = "Dados Não Salvos";

        header("Location: cadastro.php");
        exit(0);
    }
}
?>