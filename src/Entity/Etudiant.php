<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(unique: true)]
    private ?int $num_etudiant = null;

    #[ORM\Column(length: 64)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 2, nullable: true)]
    private ?string $moyenne = null;

    #[ORM\OneToMany(mappedBy: 'etudiant', targetEntity: Note::class)]
    private Collection $notes;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMoyenne(): ?string
    {
        return $this->moyenne;
    }

    public function setMoyenne(string $moyenne): self
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    /**
     * @return Collection<int, Note>
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes->add($note);
            $note->setEtudiant($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getEtudiant() === $this) {
                $note->setEtudiant(null);
            }
        }

        return $this;
    }

    public function calculerMoyenne(): ?float
    {
        // Initialiser les variables pour la somme des notes pondérées et les coefficients totaux
        $sommeNotesPonderees = 0;
        $coefficientsTotals = 0;

        // Parcourir toutes les notes de l'étudiant
        foreach ($this->getNotes() as $note) {
            // Ajouter la note pondérée à la somme des notes pondérées
            $sommeNotesPonderees += $note->getNote() * $note->getMatiere()->getCoef();

            // Ajouter le coefficient de la matière aux coefficients totaux
            $coefficientsTotals += $note->getMatiere()->getCoef();
        }

        // Si l'étudiant n'a pas de notes, retourner null
        if ($coefficientsTotals === 0) {
            return null;
        }

        // Calculer la moyenne pondérée de l'étudiant
        $moyennePonderee = $sommeNotesPonderees / $coefficientsTotals;

        // Convertir la moyenne pondérée sur 20 et retourner la moyenne
        $this->setMoyenne(round($moyennePonderee * 20 / 20, 2));
        // dd($this->setMoyenne(round($moyennePonderee * 20 / 20, 2)));
        return round($moyennePonderee * 20 / 20, 2);
    }
}
