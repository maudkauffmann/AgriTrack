<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\Table(name: 'Utilisateur')]
class Utilisateur implements PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_utilisateur', type: Types::BIGINT)]
    private ?string $id_utilisateur = null;

    #[ORM\Column(name: 'id_role', type: Types::BIGINT)]
    private ?string $id_role = null;

    #[ORM\Column(name: 'nomUtilisateur', length: 30)]
    private ?string $nomUtilisateur = null;

    #[ORM\Column(name: 'telUtilisateur', type: Types::BIGINT)]
    private ?string $telUtilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    public function getIdUtilisateur(): ?string
    {
        return $this->id_utilisateur;
    }

    public function getIdRole(): ?string
    {
        return $this->id_role;
    }

    public function setIdRole(string $id_role): static
    {
        $this->id_role = $id_role;
        return $this;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur(string $nomUtilisateur): static
    {
        $this->nomUtilisateur = $nomUtilisateur;
        return $this;
    }

    public function getTelUtilisateur(): ?string
    {
        return $this->telUtilisateur;
    }

    public function setTelUtilisateur(string $telUtilisateur): static
    {
        $this->telUtilisateur = $telUtilisateur;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function getPassword(): string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;
        return $this;
    }
}
