<?php

    include("conecta.php");
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    if(isset($_POST["Excluir"]))
    {
    $comando = $pdo->prepare("DELETE FROM cadastro where Nome='$nome'");
    $resultado = $comando->execute();
    header("Location: index.html");
    }
    if(isset($_POST["Inserir"]))
    {
        $comando = $pdo->prepare("INSERT INTO cadastro(Nome,Email,Telefone) VALUES('$nome','$email','$telefone')");
        $resultado = $comando->execute();
    
        // para voltar no forms
        header("Location: index.html");
    }
    
   

    if(isset($_POST["Alterar"]))
    {
    $comando = $pdo->prepare("UPDATE cadastro SET Nome='$nome', Email='$email', Telefone='$telefone' WHERE Nome='$nome'");
    $resultado = $comando->execute();
    header("Location: index.html");
    }
    if(isset($_POST["Listar"]))
    header("Location: index.html");
?>