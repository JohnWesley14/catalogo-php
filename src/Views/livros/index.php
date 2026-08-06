<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Livros</title>
</head>
<body>
    <h1>Biblioteca</h1>
    <?php 
    // var_dump($livros);
    ?>
    <a href="index.php?action=create">Adicionar Novo livro</a>
    <table border="1" cellpadding="8" style="margin-top: 15px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Status</th>
                <th>Nota</th>
                <th>Ações</th>

            </tr>
        </thead>
        <tbody>
            <?php if (empty($livros)): ?>
                <tr><td colspan="6" align="center" >Nenhum produto cadastrado.</td></tr>
            <?php else: ?>
                <?php foreach ($livros as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['id']) ?></td>
                        <td><?= htmlspecialchars($p['titulo']) ?></td>
                        <td> <?= htmlspecialchars($p['autor']) ?></td>
                        <td><?= htmlspecialchars(ucfirst($p['status'])) ?></td>
                        <td> <?= htmlspecialchars($p['nota']) ?></td>
                        <td> <a href="index.php?action=edit&id=<?= $p['id'] ?>">Editar</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>