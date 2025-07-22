<?php
namespace Src\Entity;

use App\Entity\AbstractEntity;
use App\Entity\Statut;

class LogEntity extends AbstractEntity
{
    private int $id;
    private string $date;
    private string $heure;
    private string $localisation;
    private string $ip_address;
    private Statut $statut;

    public function __construct(string $date, string $heure, string $localisation, string $ip_address, Statut $statut)
        {
            $this->date = $date;
            $this->heure = $heure;
            $this->localisation = $localisation;
            $this->ip_address = $ip_address;
            $this->statut = $statut;

        }
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'heure' => $this->heure,
            'localisation' => $this->localisation,
            'ip_address' => $this->ip_address,
            // 'statut' => $this->statut->getValue(),
        ];

    }

    public static function toObject($data): static
        {
            return new static(
                $data['date'],
                $data['heure'],
                $data['localisation'],
                $data['ip_adress'],
                // new Statut($data['statut'])
            );
        }
}