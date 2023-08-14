<?php

namespace App\Entity;

use App\Repository\AuditEtudiantRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuditEtudiantRepository::class)]
class AuditEtudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 14)]
    private ?string $typeAction = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updateAt = null;

    #[ORM\Column(length: 64)]
    private ?string $num_etudiant = null;

    #[ORM\Column(length: 64)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 2)]
    private ?string $moyenne_ancienne = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 2)]
    private ?string $moyenne_nouvelle = null;

    #[ORM\Column(length: 64)]
    private ?string $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeAction(): ?string
    {
        return $this->typeAction;
    }

    public function setTypeAction(string $typeAction): self
    {
        $this->typeAction = $typeAction;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeImmutable $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getNumEtudiant(): ?string
    {
        return $this->num_etudiant;
    }

    public function setNumEtudiant(string $num_etudiant): self
    {
        $this->num_etudiant = $num_etudiant;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMoyenneAncienne(): ?string
    {
        return $this->moyenne_ancienne;
    }

    public function setMoyenneAncienne(string $moyenne_ancienne): self
    {
        $this->moyenne_ancienne = $moyenne_ancienne;

        return $this;
    }

    public function getMoyenneNouvelle(): ?string
    {
        return $this->moyenne_nouvelle;
    }

    public function setMoyenneNouvelle(string $moyenne_nouvelle): self
    {
        $this->moyenne_nouvelle = $moyenne_nouvelle;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }
}
