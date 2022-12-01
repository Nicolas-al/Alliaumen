<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass : SkillsRepository::class)]
#[Vich\Uploadable]
class Skills
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column("id","integer")]
    private $id;

    
    #[ORM\Column("name", "string")]
    private $name;

    #[ORM\Column("logo", "string")]
    private $logo;

    #[Vich\UploadableField(mapping:'uploads_logos', fileNameProperty:'logo')]
    private File $logoFile;

    #[ORM\Column("type", "string")]
    private $type;

    #[ORM\Column("percent", "integer")]
    private $percent;

    #[ORM\Column("color", "string")]
    private $color;
    
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo(?string $logo)
    {
        $this->logo = $logo;

        return $this;
    }

    public function setLogoFile(File $file = null): void
    {
        $this->logoFile = $file;
        if ($file) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getLogoFile()
    {
        return $this->logoFile;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get the value of percent
     */ 
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * Set the value of percent
     *
     * @return  self
     */ 
    public function setPercent($percent)
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * Get the value of color
     *
     * @return  string
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @param  string  $color
     *
     * @return  self
     */ 
    public function setColor(string $color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
