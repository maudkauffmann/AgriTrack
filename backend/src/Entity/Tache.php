<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacheRepository::class)]
class Tache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_tache = null;

    #[ORM\Column(length: 30)]
    private ?string $nomTache = null;

    public function getId(): ?string
    {
        return $this->id_tache;
    }

    public function setId(string $id_tache): static
    {
        $this->id_tache = $id_tache;

        return $this;
    }

    public function getNomTache(): ?string
    {
        return $this->nomTache;
    }

    public function setNomTache(string $nomTache): static
    {
        $this->nomTache = $nomTache;

        return $this;
    }
}
