<?php

namespace App\Service;

use App\Repository\LogRepository;
use Src\Entity\LogEntity;



class LogService
{
    private LogRepository $logRepository;

    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function log(string $localisation, string $ip_address, $statut): void
    {
        $log = new Log(
            date('Y-m-d'),
            date('H:i:s'),
            $localisation . ' | IP: ' . $ip_address,
            $statut
        );

        $this->logRepository->insertLog($log);
    }
}
