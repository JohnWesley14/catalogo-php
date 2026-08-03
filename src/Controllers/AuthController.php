<?php 
namespace App\Controllers;

use App\Repositories\UserRepository;
use App\Models\User;

class AuthController{

    private UserRepository $repository;

    public function __construct(){
        $this->repository = new UserRepository();
    }
    public function login(){
        require __DIR__ . "/../Views/auth/login.php";
    }
    public function register(){
        require __DIR__ . "/../Views/auth/register.php";
    }
    public function save(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome  = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = $_POST['senha'] ?? '';
            $senha = password_hash($senha, PASSWORD_BCRYPT);

            // 1. Verifica se todos os campos estão preenchidos
            if (!empty($nome) && !empty($email) && !empty($senha)) {
                
                // 2. VALIDAÇÃO: Verifica se o e-mail já existe no banco
                if ($this->repository->findByEmail($email)) {
                    header("Location: index.php?action=register&erro=email_existe");
                    exit();
                }

                // 3. Salva no banco de dados
                $user = new User(nome: $nome, email: $email, senha: $senha);
                $this->repository->save($user);

                // 4. Redireciona para a tela de login exibindo sucesso
                header("Location: index.php?action=login&sucesso=1");
                exit();
            }

            // Se faltou preencher algum campo, volta informando o erro
            header("Location: index.php?action=register&erro=campos_vazios");
            exit();
        }
    }
    public function authenticate(){
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = $_POST['senha'];

        if(!empty($senha) && !empty($email)){
            $usuario = $this->repository->findByEmail($email);
           if ($usuario && password_verify($senha, $usuario['senha'])){
                if(session_status() === PHP_SESSION_NONE){
                    session_start();
                }
                $_SESSION['user_id'] = $usuario['id'];
                $_SESSION['user_nome'] = $usuario['nome'];
                $_SESSION['user_email'] = $usuario['email'];

                header("Location: index.php?action=index");
                exit();
            }else{
                header("Location: index.php?action=login&erro=1");
                exit();
            }
        }else{
            header("Location: index.php?action=login&erro=1");
            exit();
        }
    }
}



?>