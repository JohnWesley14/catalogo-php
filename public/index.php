<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ProductController;
use App\Controllers\AuthController;

$controllerProduct = new ProductController();
$controllerAuth= new AuthController();

// Pega o "action=" da URL (se não tiver nada, assume 'index')
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        require __DIR__ . '/../src/Views/products/create.php';
        break;
    case 'register':
        $controllerAuth->register(); // Apenas mostra o HTML do formulário
        break;
    case 'save_user':
        $controllerAuth->save();     // Executa o INSERT no banco de dados
        break;
    case 'login':
        $controllerAuth->login();
        break;
    case 'store':
        $controllerProduct->store();
        break;
    case 'edit':
        $controllerProduct->edit();
        break;
    case 'update':
        $controllerProduct->update();
        break;
    case 'delete':
        $controllerProduct->delete();
        break;
    // ---> SE ESTE BLOCO FALTAR, O SISTEMA SEMPRE CHAMARÁ O INDEX() <---
    case 'search':
        $controllerProduct->search();
        break;
    default:
        $controllerProduct->index();
        break;
}