<?php
session_start();
require 'dbcon.php';


if(isset($_POST['excluir']))
{

    $identradas = mysqli_real_escape_string($conn, $_POST['excluir']);
     $query = "DELETE FROM entrada WHERE id='$identradas' ";
    $query_run = mysqli_query($conn, $query);


    if ($query_run) {


        $_SESSION['message'] = "Dados Excluidos com Sucesso";

        header("Location: gestaoentradas.php");
        exit(0);
    } else {


        $_SESSION['message'] = "Falha na Exclusao ";

        header("Location: gestaoentradas.php");
        exit(0);
    }



}


if(isset($_POST['update']))

{
    $identradas = mysqli_real_escape_string($conn, $_POST['id']);
    $idproduto = mysqli_real_escape_string($conn, $_POST['idproduto']);
    $produtocodigo = mysqli_real_escape_string($conn, $_POST['produtocodigo']);
    $quantidadee = mysqli_real_escape_string($conn, $_POST['quantidadee']);
    $custo = mysqli_real_escape_string($conn, $_POST['custo']);
    $fornecedor = mysqli_real_escape_string($conn, $_POST['fornecedor']);
    $factura = mysqli_real_escape_string($conn, $_POST['factura']);
    $dataEntrada = mysqli_real_escape_string($conn, $_POST['dataEntrada']);
    $usuarioEntrada = mysqli_real_escape_string($conn, $_POST['usuarioEntrada']);
    $dataEdicao = mysqli_real_escape_string($conn, $_POST['dataEdicao']);
    $usuarioEdicao = mysqli_real_escape_string($conn, $_POST['usuarioEdicao']);
    
    $query = "UPDATE entrada SET  idproduto='$idproduto', produtocodigo='$produtocodigo', quantidadee='$quantidadee', custo='$custo', fornecedor='$fornecedor', factura='$factura', dataEntrada='$dataEntrada', usuarioEntrada='$usuarioEntrada', dataEdicao='$dataEdicao', usuarioEdicao='$usuarioEdicao' WHERE id='$identradas' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){


        $_SESSION['message'] = "Dados Actualizados com Sucesso";

        header("Location: gestaoentradas.php");
        exit(0);



    }
    else{


        $_SESSION['message'] = "Falha na Edição ";

        header("Location: gestaoentradas.php");
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