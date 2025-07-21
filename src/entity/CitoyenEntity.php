<?php
namespace Src\Entity;

use App\Entity\AbstractEntity;

class CitoyenEntity
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $cni;
    private string $date;
    private string $adresse;
    private string $cniverso;
    private string $cnirecto;

    public function __construct(
        string $nom,
        string $prenom,
        string $cni,
        string $date,
        string $adresse,
        string $cniverso,
        string $cnirecto
    ) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->cni = $cni;
        $this->date = $date;
        $this->adresse = $adresse;
        $this->cniverso = $cniverso;
        $this->cnirecto = $cnirecto;
    }

    public static function toObject($data): static
    {
        return new static(
            $data['nom'],
            $data['prenom'],
            $data['cni'],
            $data['date'],
            $data['adresse'],
            $data['cniverso'],
            $data['cnirecto']
        );
    }

    public function toArray(): array
    {
        return [
            'nom'       => $this->nom,
            'prenom'    => $this->prenom,
            'cni'       => $this->cni,
            'date'      => $this->date,
            'adresse'   => $this->adresse,
            'cniverso'  => $this->cniverso,
            'cnirecto'  => $this->cnirecto,
        ];
    }
}
