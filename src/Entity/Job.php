<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Job
 *
 * @ORM\Table(name="job")
 * @ORM\Entity()
 */
class Job
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(name="summary", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(
     *     max = 150,
     *     maxMessage = "Job summary name cannot be longer than {{ limit }} characters."
     * )
     */
    private string $summary;

    /**
     * @ORM\Column(name="description", type="text")
     * @Assert\NotBlank()
     * @Assert\Length(
     *     max = 500,
     *     maxMessage = "Job descriprion cannot be longer than {{ limit }} characters."
     * )
     */
    private string $description;

    /**
     * @ORM\Column(name="status", type="string")
     * @Assert\NotNull(message="Status cannot be blank.")
     * @Assert\Choice({"open", "closed"})
     */
    private string $status;

    /**
     * @ORM\ManyToOne(targetEntity="Property", fetch="EAGER")
     * @ORM\JoinColumn(name="property_id", referencedColumnName="id")
     * @Assert\NotNull(message="Property must be specified.")
     */
    private Property $property;

    /**
     * @ORM\ManyToOne(targetEntity="User", fetch="EAGER")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @Assert\NotNull(message="User must be specified.")
     */
    private User $user;

    public function getId(): int
    {
        return $this->id;
    }

    public function getSummary(): string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getProperty(): Property
    {
        return $this->property;
    }

    public function setProperty(Property $property): void
    {
        $this->property = $property;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
