<?php

namespace App\Entity;

use App\Repository\CVRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass : CVRepository::class)]
class CV
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column("id","integer")]
    private $id;

    #[ORM\Column("diplome", "text")]
    private $diplome;

    #[ORM\Column("age", "integer")]
    private $age;

    #[ORM\Column("formationWeb", "text")]
    private $formationWeb;

    #[ORM\Column("parcours", "text")]
    private $parcours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getFormationWeb(): ?string
    {
        return $this->formationWeb;
    }

    public function setFormationWeb(string $formationWeb): self
    {
        $this->formationWeb = $formationWeb;

        return $this;
    }

    public function getParcours(): ?string
    {
        return $this->parcours;
    }

    public function setParcours(string $parcours): self
    {
        $this->parcours = $parcours;

        return $this;
    }
}
