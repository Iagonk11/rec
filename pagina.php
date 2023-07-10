<?php
include("conecta.php");
$nome = "";
if( isset($_GET["nome"])){
    $nome = $_GET["nome"];
    $comando = $pdo->prepare("SELECT * FROM cadastro where Nome='$nome'");
}else{
    $comando = $pdo->prepare("SELECT * FROM cadastro");
}

    

$resultado = $comando->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Telefonica</title>
    <link href="css/entregas.css" rel="stylesheet"> 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        body{
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            align-content: center;
            flex-direction: column;
        }

        .cadastro{
            width: 80%;
        }

        fieldset input{
            width: 18%
        }

        .pesquisa input{
            width: 40%
        }

        .usuario{
            width: 100%
        }

        .usuariot{
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            text-align: center;
        }

        thead{
            background-color: #000;
            color: #fff
        }

        td img{
            margin-top: 5px;
            cursor: pointer
        }
    </style>

</head>
<body>
    
    <div class="cadastro">
        <h2>Lista Telefonica</h2>
        <form action="pagina.php" method="get">

            <fieldset class="pesquisa">
                <legend> Pesquisar Usuário </legend>
                
                        <input type="text" name="nome" placeholder="Nome do Usuário">
                        <input type="submit" class="botaoen" value="Pesquisar" style="width: 10%;">
                 
               </fieldset>
            </form>

            <br>

            <fieldset>
             <legend> Adicionar/Alterar Usuário </legend>
             <form action="cadastro2.php" method="post">
                    <input type="text" id="id" name="id" placeholder="Id">       
                    <input type="text" id="nome" name="nome" placeholder="Nome do Usuário" >
                    <input type="text" id="telefone" name="telefone" placeholder="Telefone">
                    <input type="text" id="email" name="email" placeholder="Email">
              
            </fieldset>
          
            <div class="botoesen">
            
            <input type="submit" class="botaoen" name="alterar" value="Alterar">
            <input type="submit" class="botaoen" name="inserir" value="Inserir">
            <input type="reset" value="Limpar" class="botaoen">
            <input type="submit" value="Excluir" name="excluir" class="botaoen">
        </div>
            </form>

            <div class="usuario">
                <table border="1" class="usuariot">
                    <thead>
                        <th>Nome</th>
                        <th>Id</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>--</th>
                    </thead>
                    <?php
                        while ($linhas = $comando->fetch()){
                            $nome = $linhas["Nome"];
                            $id = $linhas["id"];
                            $telefone = $linhas["Telefone"];
                            $email = $linhas["Email"];
                            echo("
                                <tr>
                                    <td>$nome</td>
                                    <td>$id</td>
                                    <td>$telefone</td>
                                    <td>$email</td>
                                    <td>
                                    <img src='img/lapis.png' width='25px' onclick=\"Editar('$nome','$id','$telefone','$email');\" >
                                    </td>
                                </tr>
                            ");
                        }
                    ?>
                </table>
            </div>
    </div>
<script>
    function Editar(txtnome, txtid, txttelefone, txtemail){
        nome.value = txtnome;
        id.value = txtid;
        telefone.value = txttelefone;
        email.value = txtemail;
    }

</script>
</body>
</html>