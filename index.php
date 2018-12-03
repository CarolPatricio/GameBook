<?php
include "configuration.php";
$erro = FALSE;

if( isset($_POST['entrar']) ){
    $nick = $_POST['nick'];
    $senha = $_POST['senha'];
    if(($nick) == "" || ($senha) == ""){
        echo('<script>alert("Preencha todos os campos";window.location.href="index.php";)</script>');
    }
    $result = $mybd->query("SELECT * FROM Usuario WHERE Nick == '$nick' AND Senha == '$senha'");
    if ($result != FALSE){
        if ($result->fetchArray()[0] != null) { 
            if (!isset($_SESSION)){ 
                session_start();
            }
            $_SESSION['CodUsuario'] = $result->fetcharray()['CodUsuario'];
            $_SESSION['Nick'] = $nick;
            echo('<script>alert("Você Entrou!");window.location.href="index.php";</script>');
            //header("Location: index.php"); 
            //exit;
        } else { 
            $erro = TRUE;
            //header('Location: index.php');
            //exit;
        }
    }else{
        echo('<script>alert("Erro na query");window.location.href="index.php";</script>');
    }

};
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) ){
        $output = implode( ',', $output);
    }
    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>GamesBook - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
    #erro{visibility:hidden;}
    </style>
</head>

<body>
    <form method="POST" submit="index.php">
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
            <tr id='erro'>
                <td>Senha ou Nick incorreta</td>
            </tr>
            <tr>
                <td><input type="submit" id="entrar" name="entrar"></td>
            </tr>
            <tr>
                <td><a href="cadastro.php">Cadastrar-se</a></td>
            </tr>
            
        </table>
    </form>
    <?php
    if($erro == TRUE){
        echo('<script>document.getElementById("erro").style.visibility="visible";</script>');
    }else{
        exit;
    }
    ?>
</body>

</html>
