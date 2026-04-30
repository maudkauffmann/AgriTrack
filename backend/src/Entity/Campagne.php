<?php

namespace App\Entity;

use App\Repository\CampagneRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CampagneRepository::class)]
class Campagne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_campagne = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $id_parcelle = null;

    #[ORM\Column(length: 30)]
    private ?string $nomCampagne = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateDeb = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateFin = null;

    public function getId(): ?string
    {
        return $this->id_campagne;
    }

    public function setId(string $id_campagne): static
    {
        $this->id_campagne = $id_campagne;

        return $this;
    }

    public function getIdParcelle(): ?string
    {
        return $this->id_parcelle;
    }

    public function setIdParcelle(string $id_parcelle): static
    {
        $this->id_parcelle = $id_parcelle;

        return $this;
    }

    public function getNomCampagne(): ?string
    {
        return $this->nomCampagne;
    }

    public function setNomCampagne(string $nomCampagne): static
    {
        $this->nomCampagne = $nomCampagne;

        return $this;
    }

    public function getDateDeb(): ?\DateTime
    {
        return $this->dateDeb;
    }

    public function setDateDeb(\DateTime $dateDeb): static
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTime $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }
}
