<?php

use App\Controller\CitoyenController;

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$controller = new CitoyenController();

if ($method === 'GET' && preg_match('#^/api/citoyens/([a-zA-Z0-9]+)$#', $uri, $matches)) {
    $controller->find($matches[1]);
}
elseif ($method === 'POST' && $uri === '/api/citoyens/recherche') {
    $controller->recherche();
}
else {
    http_response_code(404);
    header('Content-Type: application/json');
    echo json_encode([
        'code' => 404,
        'statut' => 'error',
        'message' => 'Route non trouvée',
        'data' => null
    ]);
}
