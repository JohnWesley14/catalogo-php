<?php
namespace App\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;

class UserController{
    private UserRepository $repository;
    public function __construct()
    {
        $this->repository = new UserRepository;
    }
   
    public function createUser(){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = filter_input(INPUT_POST, 'senha');

        $user = new User(
            nome: $nome,
            email: $email,
            senha: $senha,
        );
        $this->repository->createUser($user);
        header("Location: index.php?action=index");
        exit();
        
    }
    public function login(){

    }

    
}

?>

