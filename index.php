<?php
// página restrita
session_start();

if (!isset($_SESSION['dados_usuario'])) {
    header("location: login.php");
}

if (isset($_GET['sair'])) {
    session_destroy();
    header("location: login.php");
}
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>SisFatec - Sistema de Gestão de Produtos</title>
</head>
<body>
    <?php include 'includes/cabecalho.php' ?>

    <main>
        Aqui vai a Dashboard do sistema.

        <pre>
            <?php

            echo dirname(__FILE__);

            ?>
        </pre>


    </main>

    <?php include 'includes/rodape.php' ?>
</body>
</html>







