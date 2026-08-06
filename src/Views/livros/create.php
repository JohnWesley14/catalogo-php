<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar</title>
</head>
<body>
    <form action="index.php?action=store" method="post">
        <label>Titulo</label>
        <input type="text" name="titulo" required >
        <label>Autor</label>
        <input type="text" name="autor" required >
        <label>Status:</label>
        <select name="status">
            <option value="quero_ler" selected>📚 Quero Ler</option>
            <option value="lendo">📖 Lendo</option>
            <option value="concluido">✅ Concluído</option>
        </select>
        <label for="nota">Sua Nota:</label>
        <select name="nota" id="nota">
            <option value="">-- Sem nota ainda --</option>
            
            <option value="1">1 - Ruim 🟇</option>
            <option value="2">2 - Razoável 🟇🟇</option>
            <option value="3">3 - Bom 🟇🟇🟇</option>
            <option value="4">4 - Muito Bom 🟇🟇🟇🟇</option>
            <option value="5">5 - Excelente! 🟇🟇🟇🟇🟇</option>
        </select>
        <input type="submit" value="Cadastrar livro">
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
        gap: 10px;
    }
    label{
        text-align: left;
    }
    input, select{
        width: 175px;
    }
   
</style>
</html>