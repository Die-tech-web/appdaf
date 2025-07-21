<?php
namespace App\Core;

abstract class AbstractController
{
    protected function renderJson(array $data = [], string $status = 'success', int $code = 200, string $message = ''): void
    {
        http_response_code($code);
        header('Content-Type: application/json');

        echo json_encode([
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }

    protected function renderJsonError(string $message = 'Erreur inconnue', int $code = 400): void
    {
        $this->renderJson([], 'error', $code, $message);
    }

    protected function getJsonBody(): array
    {
        $json = file_get_contents("php://input");
        return json_decode($json, true) ?? [];
    }

  

}
