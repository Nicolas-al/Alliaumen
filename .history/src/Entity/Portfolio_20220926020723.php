<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PortfolioRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints\DateTime;

#[ORM\Entity(repositoryClass : PortfolioRepository::class)]
#[Vich\Uploadable]
class Portfolio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column("id","integer")]
    private $id;

    #[ORM\Column(type: 'string')]
    private $title;

    #[ORM\Column("description", "text")]
    private $description;

    #[ORM\Column(type: 'string')]
    private $skills;

    #[ORM\Column("image", "string")]
    private ?string $image;

    #[Vich\UploadableField(mapping:'uploads_images', fileNameProperty:'image')]
    private File $imageFile;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private \DateTimeInterface $updatedAt;

    #[ORM\Column("link", "string")]
    private $link;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(string $skills): self
    {
        $this->skills = $skills;

        return $this;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /*
    * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
    */
    public function setImageFile(File $imageFile = null): self
    {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) {
            $this->updatedAt = new DateTime();
        }
    return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
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
