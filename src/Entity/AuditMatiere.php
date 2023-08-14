<?php

namespace App\Entity;

use App\Repository\AuditMatiereRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuditMatiereRepository::class)]
class AuditMatiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    private ?string $typeAction = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updateAt = null;

    #[ORM\Column(length: 8)]
    private ?string $num_matiere = null;

    #[ORM\Column(length: 32)]
    private ?string $design = null;

    #[ORM\Column]
    private ?int $coef_ancien = null;

    #[ORM\Column]
    private ?int $coef_nouveau = null;

    #[ORM\Column(length: 32)]
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

    public function getNumMatiere(): ?string
    {
        return $this->num_matiere;
    }

    public function setNumMatiere(string $num_matiere): self
    {
        $this->num_matiere = $num_matiere;

        return $this;
    }

    public function getDesign(): ?string
    {
        return $this->design;
    }

    public function setDesign(string $design): self
    {
        $this->design = $design;

        return $this;
    }

    public function getCoefAncien(): ?int
    {
        return $this->coef_ancien;
    }

    public function setCoefAncien(int $coef_ancien): self
    {
        $this->coef_ancien = $coef_ancien;

        return $this;
    }

    public function getCoefNouveau(): ?int
    {
        return $this->coef_nouveau;
    }

    public function setCoefNouveau(int $coef_nouveau): self
    {
        $this->coef_nouveau = $coef_nouveau;

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
