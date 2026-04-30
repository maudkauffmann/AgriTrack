<?php

namespace App\Entity;

use App\Repository\OuvrierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OuvrierRepository::class)]
class Ouvrier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_ouvrier = null;

    #[ORM\Column(length: 30)]
    private ?string $nomOuvrier = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $telOuvrier = null;

    public function getId(): ?string
    {
        return $this->id_ouvrier;
    }

    public function setId(string $id_ouvrier): static
    {
        $this->id_ouvrier = $id_ouvrier;

        return $this;
    }

    public function getNomOuvrier(): ?string
    {
        return $this->nomOuvrier;
    }

    public function setNomOuvrier(string $nomOuvrier): static
    {
        $this->nomOuvrier = $nomOuvrier;

        return $this;
    }

    public function getTelOuvrier(): ?string
    {
        return $this->telOuvrier;
    }

    public function setTelOuvrier(string $telOuvrier): static
    {
        $this->telOuvrier = $telOuvrier;

        return $this;
    }
}
