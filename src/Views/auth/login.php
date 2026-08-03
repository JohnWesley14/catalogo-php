<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <?php
    $sucesso = $_GET['sucesso'] ?? null;
    $erro    = $_GET['erro'] ?? null;
    ?>

    <!-- CAIXA DE ALERTA DE SUCESSO -->
    <?php if ($sucesso === '1'): ?>
        <div style="background-color: #e8f5e9; color: #2e7d32; padding: 12px; border-left: 4px solid #2e7d32; margin-bottom: 15px;">
            <strong>Sucesso!</strong> Seu cadastro foi realizado com sucesso. Faça login para continuar.
        </div>
    <?php endif; ?>

    <!-- CAIXA DE ALERTA DE ERRO NO LOGIN -->
    <?php if ($erro === '1'): ?>
        <div style="background-color: #ffebee; color: #c62828; padding: 12px; border-left: 4px solid #c62828; margin-bottom: 15px;">
            <strong>Erro de autenticação:</strong> E-mail ou senha incorretos.
        </div>
    <?php endif; ?>
    
    <form action="index.php?action=login" method="POST">
        <input type="email" name="email" id="" placeholder="email">
        <input type="text" name="senha" id="" placeholder="senha">
        <input type="submit" value="cadastrar">
    </form>
</body>
</html>
<?php ?>