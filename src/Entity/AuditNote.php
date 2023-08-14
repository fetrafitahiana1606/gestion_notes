<?php

namespace App\Entity;

use App\Repository\AuditNoteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuditNoteRepository::class)]
class AuditNote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 12)]
    private ?string $typeOperation = null;

    #[ORM\Column]
    private ?int $num_etudiant = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 2)]
    private ?string $note_ancienne = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 2)]
    private ?string $note_nouvelle = null;

    #[ORM\Column(length: 32)]
    private ?string $user = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updateAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeOperation(): ?string
    {
        return $this->typeOperation;
    }

    public function setTypeOperation(string $typeOperation): self
    {
        $this->typeOperation = $typeOperation;

        return $this;
    }

    public function getNumEtudiant(): ?int
    {
        return $this->num_etudiant;
    }

    public function setNumEtudiant(int $num_etudiant): self
    {
        $this->num_etudiant = $num_etudiant;

        return $this;
    }

    public function getNoteAncienne(): ?string
    {
        return $this->note_ancienne;
    }

    public function setNoteAncienne(string $note_ancienne): self
    {
        $this->note_ancienne = $note_ancienne;

        return $this;
    }

    public function getNoteNouvelle(): ?string
    {
        return $this->note_nouvelle;
    }

    public function setNoteNouvelle(string $note_nouvelle): self
    {
        $this->note_nouvelle = $note_nouvelle;

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

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeImmutable $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }
}
