<?php

namespace App\Entity;

use App\Repository\ActuRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ActuRepository::class)
 */
class Actu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     * min="5",
     * max="255",
     * minMessage = "Votre titre est trop court il doit dépassé 5 charactères !",
     * maxMessage = "Votre titre est trop long il ne doit pas dépassé 255 charactères !" )
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     * min="30",
     * minMessage = "Votre contenu est trop court il doit dépassé 30 charactères !"
     * )
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url()
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
