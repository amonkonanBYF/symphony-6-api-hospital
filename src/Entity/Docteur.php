<?php

namespace App\Entity;

use App\Repository\DocteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: DocteurRepository::class)]
class Docteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $note = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $comment = [];

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $speciality = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $prices = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private ?array $schedule = null;
    
    #[ORM\ManyToOne(inversedBy: '_doctors')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $_user = null;

    #[ORM\ManyToMany(targetEntity: Patient::class)]
    private Collection $_patients;

    #[ORM\OneToMany(mappedBy: 'docteur', targetEntity: Consultation::class, orphanRemoval: true)]
    private Collection $_consultations;

    public function __construct()
    {
        $this->_patients = new ArrayCollection();
        $this->_consultations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getComment(): array
    {
        return $this->comment;
    }

    public function setComment(array $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getSpeciality(): ?array
    {
        return $this->speciality;
    }

    public function setSpeciality(?array $speciality): static
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getPrices(): ?array
    {
        return $this->prices;
    }

    public function setPrices(?array $prices): static
    {
        $this->prices = $prices;

        return $this;
    }

    public function getSchedule(): ?array
    {
        return $this->schedule;
    }

    public function setSchedule(?array $schedule): static
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->_user;
    }

    public function setUser(?User $_user): static
    {
        $this->_user = $_user;

        return $this;
    }

    /**
     * @return Collection<int, Patient>
     */
    public function getPatients(): Collection
    {
        return $this->_patients;
    }

    public function addPatient(Patient $patient): static
    {
        if (!$this->_patients->contains($patient)) {
            $this->_patients->add($patient);
        }

        return $this;
    }

    public function removePatient(Patient $patient): static
    {
        $this->_patients->removeElement($patient);

        return $this;
    }

    /**
     * @return Collection<int, Consultation>
     */
    public function getConsultations(): Collection
    {
        return $this->_consultations;
    }

    public function addConsultation(Consultation $consultation): static
    {
        if (!$this->_consultations->contains($consultation)) {
            $this->_consultations->add($consultation);
            $consultation->setDocteur($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): static
    {
        if ($this->_consultations->removeElement($consultation)) {
            // set the owning side to null (unless already changed)
            if ($consultation->getDocteur() === $this) {
                $consultation->setDocteur(null);
            }
        }

        return $this;
    }
}
