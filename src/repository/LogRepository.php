
<?php
class LogRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertLog(LogRepository $logRepository): void
    {
        $query = $this->pdo->prepare('INSERT INTO log (date, heure, localisation, status) VALUES (:date, :heure, :localisation, :status)');
        $query->execute([
            'date' => $logRepository->getDate(),
            'heure' => $logRepository->getHeure(),
            'localisation' => $logRepository->getLocalisation(),
            'status' => $logRepository->getStatut(),
        ]);
    }
} 
