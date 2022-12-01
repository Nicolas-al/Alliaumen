<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use App\Repository\PortfolioRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass : PortfolioRepository::class)]
#[Vich\Uploadable]
class Portfolio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column("id","integer")]
    private $id;

    #[ORM\Column("title", "string")]
    private $title;

    #[ORM\Column("description", "text")]
    private $description;

    #[ORM\Column("skills", "string")]
    private $skills;

    #[ORM\Column("image", "string")]
    private $image;

    #[Vich\UploadableField(mapping:'uploads_logos', fileNameProperty:'logo')]
    private ?File $imageFile;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

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

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    public function setImageFile(?File $image = null): void
    {
        $this->imageFile = $image;
        if (null !== $image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
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

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setPortfolio($this);
        }

        return $this;
    }

    public function removecomment(Comments $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getPortfolio() === $this) {
                $comment->setPortfolio(null);
            }
        }

        return $this;
    }

}
