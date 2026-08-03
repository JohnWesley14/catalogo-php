<?php
// Captura o tipo de erro da URL, se houver
$erro = $_GET['erro'] ?? null;
?>
<?php if ($erro === 'email_existe'): ?>
    <div style="background-color: #ffebee; color: #c62828; padding: 12px; border-left: 4px solid #c62828; margin-bottom: 15px;">
        <strong>Erro:</strong> Este e-mail já está cadastrado em nosso sistema. Tente fazer login ou use outro e-mail.
    </div>
<?php elseif ($erro === 'campos_vazios'): ?>
    <div style="background-color: #fff3e0; color: #ef6c00; padding: 12px; border-left: 4px solid #ef6c00; margin-bottom: 15px;">
        <strong>Atenção:</strong> Preencha todos os campos corretamente para continuar.
    </div>
<?php endif; ?>
<form action="index.php?action=save_user" method="POST">
    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
    </div>

    <div>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
    </div>

    <button type="submit">Cadastrar</button>
</form>
    <p>Já tem uma conta? <a href="index.php?action=login">Faça login aqui</a></p>
