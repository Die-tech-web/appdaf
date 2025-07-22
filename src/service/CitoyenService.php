<?php

namespace App\Service;

use App\Entity\Citoyen;
use App\Entity\CitoyenRepository;
use Src\Entity\CitoyenEntity;

class CitoyenService
{
    private CitoyenRepository $repository;

    public function __construct(CitoyenRepository $citoyenrepository)
    {
        $this->CitoyenRepository = $citoyenrepository;
    }

    public function getCitoyenByCni(string $cni): ?CitoyenEntity
    {
        return $this->repository->selectByCni($cni);

    }
}
