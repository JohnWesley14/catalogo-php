<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ProductController;

$controller = new ProductController();

// Pega o "action=" da URL (se não tiver nada, assume 'index')
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        require __DIR__ . '/../src/Views/products/create.php';
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit': // <--- NOVO
        $controller->edit();
        break;
    case 'update': // <--- NOVO
        $controller->update();
        break;
    case 'index':
    default:
        $controller->index();
        break;
}