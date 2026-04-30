<?php

namespace App\Entity;

use App\Repository\CultureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CultureRepository::class)]
class Culture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_culture = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_tp_culture = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_campagne = null;

    #[ORM\Column(length: 30)]
    private ?string $nomCulture = null;

    public function getId(): ?string
    {
        return $this->id_culture;
    }

    public function setId(string $id_culture): static
    {
        $this->id_culture = $id_culture;

        return $this;
    }

    public function getIdTpCulture(): ?string
    {
        return $this->id_tp_culture;
    }

    public function setIdTpCulture(string $id_tp_culture): static
    {
        $this->id_tp_culture = $id_tp_culture;

        return $this;
    }

    public function getIdCampagne(): ?string
    {
        return $this->id_campagne;
    }

    public function setIdCampagne(string $id_campagne): static
    {
        $this->id_campagne = $id_campagne;

        return $this;
    }

    public function getNomCulture(): ?string
    {
        return $this->nomCulture;
    }

    public function setNomCulture(string $nomCulture): static
    {
        $this->nomCulture = $nomCulture;

        return $this;
    }
}
