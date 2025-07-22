<?php
namespace App\Entity;

use PDO;
use Src\Entity\CitoyenEntity;

class CitoyenRepository extends CitoyenEntity
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectByCni(string $cni): ?CitoyenEntity
    {
        $query = $this->pdo->prepare('SELECT * FROM citoyen WHERE cni = :cni');
        $query->execute(['cni' => $cni]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return CitoyenEntity::toObject($data);
    }
}
