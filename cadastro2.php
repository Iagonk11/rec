<?php
    include("conecta.php");

    $nome       = $_POST["nome"];
    $email      = $_POST["email"];
    $telefone  = $_POST["telefone"];
    $id = $_POST["id"];

    if(isset($_POST["inserir"]))
    {
        $comando = $pdo->prepare("INSERT INTO cadastro(id,Nome,Email,Telefone) VALUES('$id', $nome','$email','$telefone')");
        $resultado = $comando->execute();
    
        // para voltar no forms
        header("Location: pagina.php");
    }
    if(isset($_POST["excluir"]))
    {
        $comando = $pdo->prepare("DELETE FROM cadastro where id='$id'");
        $resultado = $comando->execute();
        header("Location: pagina.php");
        }
    if(isset($_POST["alterar"]))
    {
        $comando = $pdo->prepare("UPDATE cadastro SET Nome='$nome', Email='$email', Telefone='$telefone' WHERE id='$id'");
        $resultado = $comando->execute();
        header("Location: pagina.php");
        }
?>