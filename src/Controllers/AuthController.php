<?php 
namespace App\Controllers;

use App\Repositories\UserRepository;

class AuthController{

    private UserRepository $repository;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }
    public function login(){
        require __DIR__ . "/../Views/auth/login.php";

        $nome       = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha  = $_POST['senha'] ?? '';

        if(!empty($nome) && !empty($senha)){
            header("Location: index.php?action=index");
            exit();
        }
    }

}
?>