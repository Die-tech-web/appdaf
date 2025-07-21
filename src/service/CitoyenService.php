<?php

namespace App\Service;

use App\Entity\Citoyen;
use App\Entity\CitoyenRepository;

class CitoyenService
{
    private CitoyenRepository $repository;

    public function __construct(CitoyenRepository $citoyenrepository)
    {
        $this->CitoyenRepository = $citoyenrepository;
    }

    public function getCitoyenByCni(string $cni): ?Citoyen
    {
        return $this->repository->selectByCni($cni);
    }
}
