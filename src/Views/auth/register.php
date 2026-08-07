<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <form action="?action=create-user" method="POST">
        <div>
            <label for="">Nome: </label>
            <input type="text" name="nome">
        </div>
        <div>
            <label for="">Email: </label>
            <input type="email" name="email">
        </div>
        <div>

            <label for="">Senha: </label>
            <input type="text" name="senha">
        </div>
        <div>
            <input type="submit" value="Registrar">
            <a href="?action=login">Já tem uma conta?</a>
        </div>
    </form>
    <style>
        body {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            flex-direction: column;
        }

        div {
            margin-top: 10px;
        }
    </style>
</body>

</html>