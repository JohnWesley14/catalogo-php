<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <form action="index.php?action=update" method="post">
        <label>Nome</label>
        <input type="text" name="nome" required >
        <label>Descrição</label>
        <input type="text" name="descricao" required >
        <label>Preço</label>
        <input type="number" name="preco" step="0.01" required >
        <label>Quantidade</label>
        <input type="number" name="quantidade" required>
        <label>Id</label>
        <input type="number" name="quantidade" required>
        <input type="submit" value="Editar">
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