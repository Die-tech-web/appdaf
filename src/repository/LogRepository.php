<?php

namespace App\Repository;
use PDO;
use \Src\Entity\LogEntity;
class LogRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertLog(LogEntity $logEntity): int
    {
        $query = $this->pdo->prepare('INSERT INTO log (date, heure, localisation, ip_adress, statut) VALUES (:date, :heure, :localisation, :ip_adress, :statut)');
        $data = $logEntity->toArray();
        
        $query->execute([
            'date' => $data['date'],
            'heure' => $data['heure'],
            'localisation' => $data['localisation'],
            'ip_adress' => $data['ip_adress'],
            'statut' => $data['statut'],
        ]);
        
        return (int)$this->pdo->lastInsertId();
    }

    }

