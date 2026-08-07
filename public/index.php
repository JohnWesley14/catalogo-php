<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\LivroController;
use App\Controllers\UserController;

$controller = new LivroController();
$controllerAuth = new UserController();

// Um roteamento básico via parâmetro URL `?action=` ou URI simples
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        require __DIR__ . '/../src/Views/livros/create.php';
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'create-user':
        $controllerAuth->createUser();
        break;
    case 'register':
        $controller->register();
        break;
    case 'login':
        $controller->login();
        break;
    case 'index':
    default:
        $controller->index();
        break;
}
