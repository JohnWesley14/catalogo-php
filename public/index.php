<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\LivroController;

$controller = new LivroController();

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
    case 'index':
    case 'register':
        $controller->register();
    default:
        $controller->index();
        break;
}
