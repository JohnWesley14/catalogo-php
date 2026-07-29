<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <form action="index.php?action=update" method="post">
        <!-- Input oculto com o ID do produto para o UPDATE saber quem alterar -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($produto->getId()) ?>">

        <label>Nome</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($produto->getNome()) ?>" required>

        <label>Descrição</label>
        <input type="text" name="descricao" value="<?= htmlspecialchars($produto->getDescricao()) ?>" required>

        <label>Preço</label>
        <input type="number" name="preco" step="0.01" value="<?= htmlspecialchars($produto->getPreco()) ?>" required>

        <label>Quantidade</label>
        <input type="number" name="quantidade" value="<?= htmlspecialchars($produto->getQuantidade()) ?>" required>

        <input type="submit" value="Salvar Alterações">
    </form>
</body>
<style>
    body{
        height: 100vh;
        width: 100vw;
        overflow: hidden;
    }
    form{
        display: flex;
        align-items: center;
        flex-direction: column;
    }
</style>
</html>