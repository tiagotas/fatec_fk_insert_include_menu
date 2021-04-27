<?php
session_start();

include dirname(__FILE__) . '/../../DAO/ProdutoDAO.php';

$dao = new ProdutoDAO();

$lista_produtos = $dao->getAllRows();

?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>SisFatec - Lista de Produto</title>
    </head>
    <body>

        <?php include dirname(__FILE__) . '/../../includes/cabecalho.php' ?>

        <main>
        <h2>Lista de Produtos</h2>

        <table>
            <thead>
                <tr>
                    <th>Ações</th>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Data de Cadastro</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($lista_produtos as $item): ?>
                <tr>
                    <td> <a href="/modulos/produto/cadastrar_produto.php?id=<?= $item->id ?>">Abrir</a> </td>
                    <td><?= $item->id ?></td>
                    <td><?= $item->descricao ?></td>
                    <td><?= $item->descricao_categoria ?></td>
                    <td>R$ <?= number_format($item->preco, 2, ",", ".") ?></td>
                    <td><?= $item->data_cadastro ?></td>
                </tr>
                <?php endforeach ?>
            
            </tbody>
        </table>
        
        </main>

        <?php include dirname(__FILE__) . '/../../includes/rodape.php' ?>

    </body>
</html>