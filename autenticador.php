<?php
try {

    session_start();

    $usuario_digitado = $_REQUEST['usuario'];
    $senha_digitada = $_REQUEST['senha'];

    include 'DAO/MySQL.php';

    $mysql = new MySQL();

    $sql = "SELECT id, nome, DATE_FORMAT(data_cadastro, '%d/%m/%Y - %H:%i') AS data_cad 
        FROM usuario
        WHERE usuario = ? AND senha = ? ";

    $stmt = $mysql->prepare($sql);
    $stmt->bindValue(1, $usuario_digitado);
    $stmt->bindValue(2, sha1($senha_digitada));
    $stmt->execute();

    $dados_usuario = $stmt->fetchObject();


    // Comparando o certo com o digitado.
    if ($dados_usuario) {

        $_SESSION['dados_usuario'] = $dados_usuario;
        header("Location: index.php");

    } else {

        header("Location: login.php?erro=true");
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
