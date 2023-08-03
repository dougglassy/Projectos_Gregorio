<?php
session_start();
require 'dbcon.php';


if(isset($_POST['excluir']))
{

    $idusuario = mysqli_real_escape_string($conn, $_POST['excluir']);
     $query = "DELETE FROM users WHERE id='$idusuario' ";
    $query_run = mysqli_query($conn, $query);


    if ($query_run) {


        $_SESSION['message'] = "Dados Excluidos com Sucesso";

        header("Location: indice.php");
        exit(0);
    } else {


        $_SESSION['message'] = "Falha na Exclusao ";

        header("Location: indice.php");
        exit(0);
    }



}


if(isset($_POST['update']))

{
    $idusuario = mysqli_real_escape_string($conn, $_POST['idusuario']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "UPDATE users SET  fullname='$name', email='$email', password='$password' WHERE id='$idusuario' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){


        $_SESSION['message'] = "Dados Actualizados com Sucesso";

        header("Location: indice.php");
        exit(0);



    }
    else{


        $_SESSION['message'] = "Falha na Edição ";

        header("Location: indice.php");
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