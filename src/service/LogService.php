<?php
namespace Src\Service;

use LogRepository;
use Src\Entity\LogEntity;
use Src\Repository\RepositoryLog;
use Src\Entity\Status;

class LogService
{
    private LogRepository $logRepository;

    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function log(string $localisation, string $ip, Status $status): void
    {
        $log = new LogEntity(
            date('Y-m-d'),
            date('H:i:s'),
            $localisation . ' | IP: ' . $ip,
            $status
        );

        $this->logRepository->insertLog($log);
    }
}
