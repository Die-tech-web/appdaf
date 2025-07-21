<?php

namespace App\Controller;

use App\Core\AbstractController;
use App\Service\CitoyenService;
use App\Entity\CitoyenRepository;
use App\Core\Database;

class CitoyenController extends AbstractController
{
    private CitoyenService $citoyenservice;

    public function __construct()
    {
        $citoyenrepository = new CitoyenRepository((new Database())->getConnection());
        $this->citoyenservice = new CitoyenService($citoyenrepository);
    }

   
    public function find(string $cni): void
    {
        $this->handleCitoyenSearch($cni);
    }

    public function recherche(): void
    {
        $payload = $this->getJsonBody();

        if (empty($payload['cni'])) {
            $this->jsonResponse([
                'data' => null,
                'statut' => 'error',
                'code' => 400,
                'message' => 'Le champ CNI est requis'
            ], 400);
            return;
        }

        $this->handleCitoyenSearch($payload['cni']);
    }

    private function handleCitoyenSearch(string $cni): void
    {
        $citoyen = $this->citoyenservice->getCitoyenByCni($cni);

        if (!$citoyen) {
            $this->jsonResponse([
                'data' => null,
                'statut' => 'error',
                'code' => 404,
                'message' => 'Le numéro de carte d\'identité non retrouvé'
            ], 404);
            return;
        }

        $this->jsonResponse([
            'data' => [
                'nci'       => $citoyen->getCni(),
                'nom'       => $citoyen->getNom(),
                'prenom'    => $citoyen->getPrenom(),
                'date'      => $citoyen->getDate(),
                'lieu'      => $citoyen->getAdresse(),
                'cnirecto'  => $citoyen->getCnirecto(),
                'cniverso'  => $citoyen->getCniverso()
            ],
            'statut' => 'success',
            'code' => 200,
            'message' => 'Le numéro de carte d\'identité a été retrouvé'
        ], 200);
    }
}
