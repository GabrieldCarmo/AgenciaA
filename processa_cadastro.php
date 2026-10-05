<?php 
// Conexão com o banco de dados
include "conexao.php";

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $tipo_perfil = $_POST['tipo_perfil'];
    }

$verificaEmail = "SELECT usuario_id FROM tbl_usuarios WHERE email = :email";
$preparaConsulta = $cn -> prepare($verificaEmail);
$preparaConsulta -> bindValue(':email', $email, PDO::PARAM_STR);
$preparaConsulta -> execute();

if($_preparaConsulta -> rowCount() > 0){
    echo"<script>
            alert('Email já cadastrado no sistema! Tente fazer o login');
            window.location.href='login.php';
         </script>";
}
?>