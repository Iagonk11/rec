<?php

    include("conecta.php");
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    if(isset($_POST["Excluir"]))
    {
    $comando = $pdo->prepare("DELETE FROM cadastro where Email=$email");
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
    
    if(isset($_POST["Pesquisar"]))
    {
        $comando = $pdo->prepare("SELECT * FROM cadastros where id_cadastro=$id_cadastro");

        $resultado = $comando->execute();
        while ($linhas = $comando->fetch())
    {
        
            $c = $linhas["CPF"];
            $e = $linhas["Email"];
            $u = $linhas["Usuario"];
            $s = $linhas["Senha"];
            $id = $linhas["id_cadastro"];
            echo($id);
            $cep = $linhas["CEP"];
            if($id>0)
            {
            echo("<br> <b>$c</b> $e $u $s $id $cep <br> <br>");
            }
            else
            {
                header("Location:index.html");
            }
    }
    }

    if(isset($_POST["Alterar"]))
    {
    $comando = $pdo->prepare("UPDATE cadastro SET Nome='$nome', Email='$email', Telefone='$telefone' WHERE Email='$email'");
    $resultado = $comando->execute();
    header("Location: index.html");
    }

?>