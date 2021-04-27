<?php
session_start();

try {

    include dirname(__FILE__) . '/../../DAO/CategoriaDAO.php';
    $dao_categoria = new CategoriaDAO();
    $lista_categorias = $dao_categoria->getAllRows();


    if(isset($_GET['salvar']))
    {
        include dirname(__FILE__) . '/../../DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $dados_produto = array(
            'descricao' => $_POST['descricao'],
            'id_categoria' => $_POST['id_categoria'],
            'preco' => $_POST['preco']
        );

        if(isset($_POST['id']))
        {
            $dados_produto['id'] = $_POST['id'];

            $dao->update($dados_produto);

        } else {
            $dao->insert($dados_produto);
        }       

        header("Location: /modulos/produto/listar_produtos.php");
    }


    if (isset($_GET['id'])) {
        
        include dirname(__FILE__) . '/../../DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        $id_produto = (int) $_GET['id'];

        $dados_produto = $dao->getById($id_produto);

    } else {

        $dados_produto = new stdClass();
        $dados_produto->id = null;
        $dados_produto->descricao = null;
        $dados_produto->preco = null;
        $dados_produto->id_categoria = null;
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>SisFatec - Cadastro de Produto</title>
</head>

<body>

    <?php include dirname(__FILE__) . '/../../includes/cabecalho.php' ?>

    <main>
        <h2>Cadastro de Produtos</h2>

        <form action="?salvar=true" method="post">

            <label for="descricao">Descrição: </label>
            <input type="text" name="descricao" id="descricao" value="<?= $dados_produto->descricao ?>" />

            <label for="id_categoria">Categoria: </label>
            <select name="id_categoria" id="id_categoria">
                <option value="">Selecione a Categoria</option>

                <?php                 
                    foreach ($lista_categorias as $item) : 
                        $selected = ($dados_produto->id_categoria == $item->id) ? 'selected' : '';               
                    ?>
                    <option value="<?= $item->id ?>" <?= $selected ?>> <?= $item->descricao ?> </option>
                <?php endforeach ?>

            </select>

            <label for="preco">Preço </label>
            <input type="number" name="preco" id="preco" value="<?= $dados_produto->preco ?>"/>

            <?php if($dados_produto->id !== null): ?>
                <input type="hidden" name="id" value="<?= $dados_produto->id ?>" />
            <?php endif?>

            <button type="submit">Salvar</button>
        </form>

    </main>

    <?php include dirname(__FILE__) . '/../../includes/rodape.php' ?>

</body>

</html>