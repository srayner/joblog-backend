<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    private $id;

    /**
     * @ORM\Column(name="summary", type="string", length=100)
     */
    private $summary;

    /**
     * @ORM\Column(name="description", type="text", length=500)
     */
    private $description;

    /**
     * @ORM\Column(name="status", type="string")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Property", fetch="EAGER")
     * @ORM\JoinColumn(name="property_id", referencedColumnName="id")
     */
    private $property;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $summary
     */
    public function setSummary($summary): void
    {
        $this->summary = $summary;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param mixed $property
     */
    public function setProperty($property): void
    {
        $this->property = $property;
    }
}
