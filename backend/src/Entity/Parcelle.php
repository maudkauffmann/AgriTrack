<?php

namespace App\Entity;

use App\Repository\ParcelleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParcelleRepository::class)]
class Parcelle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_parcelle",type: Types::BIGINT)]
    private ?string $id_parcelle = null;

    #[ORM\ManyToOne(targetEntity: Plantation::class)]
    #[ORM\JoinColumn(name: "id_plantation", referencedColumnName: "id_plantation", nullable: false)]
    private ?Plantation $id_plantation = null;

    #[ORM\Column(name:"nomParcelle",length: 30)]
    private ?string $nomParcelle = null;

    #[ORM\Column(name: "superficieParc")]
    private ?float $superficieParc = null;

    public function getId(): ?string
    {
        return $this->id_parcelle;
    }

    public function setId(string $id_parcelle): static
    {
        $this->id_parcelle = $id_parcelle;

        return $this;
    }

    public function getIdParcelle(): ?int
    {
        return $this->id_parcelle;
    }

    public function getIdPlantation(): ?Plantation
    {
        return $this->id_plantation;
    }

    public function setIdPlantation(?Plantation $plantation): static
    {
        $this->id_plantation = $plantation;
        return $this;
    }

    public function getNomParcelle(): ?string
    {
        return $this->nomParcelle;
    }

    public function setNomParcelle(string $nomParcelle): static
    {
        $this->nomParcelle = $nomParcelle;

        return $this;
    }

    public function getSuperficieParc(): ?float
    {
        return $this->superficieParc;
    }

    public function setSuperficieParc(float $superficieParc): static
    {
        $this->superficieParc = $superficieParc;

        return $this;
    }
}
