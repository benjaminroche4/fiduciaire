<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    #[Assert\Length(
        min: 3,
        max: 60,
        minMessage: 'Ce champ doit faire au minimum {{ limit }} caractères.',
        maxMessage: 'Ce champ doit faire au maximum {{ limit }} caractères.',
    )]
    private ?string $firstName = null;

    #[ORM\Column(length: 60)]
    #[Assert\Length(
        min: 3,
        max: 60,
        minMessage: 'Ce champ doit faire au minimum {{ limit }} caractères.',
        maxMessage: 'Ce champ doit faire au maximum {{ limit }} caractères.',
    )]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'Ce champ doit faire au minimum {{ limit }} caractères.',
        maxMessage: 'Ce champ doit faire au maximum {{ limit }} caractères.',
    )]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'Ce champ doit faire au minimum {{ limit }} caractères.',
        maxMessage: 'Ce champ doit faire au maximum {{ limit }} caractères.',
    )]
    private ?string $help = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $message = null;

    #[ORM\Column]
    private ?bool $accept = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(length: 15, nullable: true)]
    #[Assert\Length(
        min: 4,
        max: 15,
        minMessage: 'Ce champ doit faire au minimum {{ limit }} caractères',
        maxMessage: 'Ce champ doit faire au maximum {{ limit }} caractères',
    )]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        min: 2,
        max: 60,
        minMessage: 'Ce champ doit faire au minimum {{ limit }} caractères',
        maxMessage: 'Ce champ doit faire au maximum {{ limit }} caractères',
    )]
    private ?string $society = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getHelp(): ?string
    {
        return $this->help;
    }

    public function setHelp(string $help): static
    {
        $this->help = $help;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function isAccept(): ?bool
    {
        return $this->accept;
    }

    public function setAccept(bool $accept): static
    {
        $this->accept = $accept;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getSociety(): ?string
    {
        return $this->society;
    }

    public function setSociety(?string $society): static
    {
        $this->society = $society;

        return $this;
    }
}
