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
        require __DIR__ . "/../Views/products/login.php";
    }

}
?>