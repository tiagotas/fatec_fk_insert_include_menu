<header>

    <h1>SisFatec</h1>

    Bem-vindo (a) <?= $_SESSION['dados_usuario']->nome ?> |

    <a href="?sair=true">sair</a>

    <nav>
        <a href="/">Home</a>
        <a href="/modulos/categoria/cadastrar_categoria.php">Cadastrar Categoria</a>
        <a href="/modulos/categoria/listar_categoria.php">Listar Categorias</a>

        <a href="/modulos/produto/cadastrar_produto.php">Cadastrar Produto</a>
        <a href="/modulos/produto/listar_produtos.php">Listar Produtos</a>
    </nav>

</header>