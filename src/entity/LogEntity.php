<?php
namespace Src\Entity;

use SetterGetter;
use Status;
class LogEntity extends SetterGetter
{
    private int $id;
    private string $date;
    private string $heure;
    private string $localisation;
    private Status $status;

    public function __construct(string $date, string $heure, string $localisation, Status $status)
    {
        $this->date = $date;
        $this->heure = $heure;
        $this->localisation = $localisation;
        $this->satut = $status;

    }

    // public function getDate(): string
    // {
    //     return $this->date;
    // }
    // public function setDate(string $date): void
    // {
    //     $this->date = $date;
    // }
    // public function getHeure(): string
    // {
    //     return $this->heure;
    // }
    // public function setHeure(string $heure): void
    // {
    //     $this->heure = $heure;
    // }
    // public function getLocalisation(): string
    // {
    //     return $this->localisation;
    // }
    // public function setLocalisation(string $localisation): void
    // {
    //     $this->localisation = $localisation;
    // }
    // public function getStatut(): Status
    // {
    //     return $this->status;
    // }
    // public function setStatus(Status $status): void
    // {
    //     $this->satut = $status;
    // }
}

