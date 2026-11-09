<?php 
// Conexão com o banco de dados
include "conexao.php";

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $tipo_perfil = $_POST['tipo_perfil'];


    $verificaEmail = "SELECT usuario_id FROM tbl_usuarios WHERE email = :email";
    $preparaConsulta = $cn -> prepare($verificaEmail);
    $preparaConsulta -> bindValue(':email', $email, PDO::PARAM_STR);
    $preparaConsulta -> execute();

    if($preparaConsulta -> rowCount() > 0){
        echo"<script>
                alert('Email já cadastrado no sistema! Tente fazer o login');
                window.location.href='login.php';
            </script>";
    }else {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);  
        $inserirUsuario = "INSERT INTO tbl_usuarios (nome, email, senha, tipo_perfil)
                        VALUES (:nome, :email, :senha, :tipo_perfil)";
        try{
            $prepararInsert = $cn -> prepare($inserirUsuario);
            $prepararInsert -> bindValue(':nome' , $nome);
            $prepararInsert -> bindValue(':email' , $email);
            $prepararInsert -> bindValue(':senha' , $senhaHash);
            $prepararInsert -> bindValue(':tipo_perfil' , $tipo_perfil);
            $prepararInsert -> execute();
        
            echo"<script> 
                alert('Usuário cadastrado com sucesso! Clique OK para voltar a tela de login');
                window.location.href='login.php';
            </script>";
    
        } catch(PDOException $erro){
            echo "Ocorreu um erro: " . $erro->getMessage();
        }
    }
}      
?>