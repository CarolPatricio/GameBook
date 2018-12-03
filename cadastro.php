<?php 
include "configuration.php";

if(isset($_POST['cadastrar'])){
    $nick = $_POST['nick'];
    $senha = $_POST['senha'];
    $query_select = "SELECT Nick FROM Usuario WHERE Nick = '$nick'";
    $result = $mybd->query($query_select);
    $array = $result->fetcharray();
    $logarray = $array['Nick'];
    
    if($nick == "" || $nick == null){
        echo"<script language='javascript' type='text/javascript'>alert('O campo Nick deve ser preenchido');window.location.href='cadastro.php';</script>";

    }else{
        if($logarray == $nick){

            echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.php';</script>";
            die();

        }else{
            $query = "INSERT INTO Usuario (Nick,Senha) VALUES ('$nick','$senha')";
            $insert = $mybd->query($query);
                
            if($insert){
                echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='index.php'</script>";
            }else{
                echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.php'</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>GamesBook - Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
    #erro{visibility:hidden;}
    </style>
</head>

<body>
    <form method="POST" submit="cadastro.php">
        <table>
            <tr>
                <td>Nick:</td>
                <td>
                    <input type="text" id="nick" name="nick">
                </td>
            </tr>
            <tr>
                <td>Senha:</td>
                <td>
                    <input type="text" id="senha" name="senha">
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar"></td>
            </tr>
            <tr id='erro'>
                <td>Senha ou Nick já existem</td>
            </tr>
        </table>
    </form>

</body>

</html>
