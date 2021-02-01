<?php

namespace App\Entity;

use App\Repository\WeighingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WeighingRepository::class)
 */
class Weighing
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $weight;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $waistCircumference;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $hipsCircumference;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $chestCircumference;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $armCircumference;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $thighCircumference;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMilestone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getWaistCircumference(): ?int
    {
        return $this->waistCircumference;
    }

    public function setWaistCircumference(?int $waistCircumference): self
    {
        $this->waistCircumference = $waistCircumference;

        return $this;
    }

    public function getHipsCircumference(): ?int
    {
        return $this->hipsCircumference;
    }

    public function setHipsCircumference(?int $hipsCircumference): self
    {
        $this->hipsCircumference = $hipsCircumference;

        return $this;
    }

    public function getChestCircumference(): ?int
    {
        return $this->chestCircumference;
    }

    public function setChestCircumference(?int $chestCircumference): self
    {
        $this->chestCircumference = $chestCircumference;

        return $this;
    }

    public function getArmCircumference(): ?int
    {
        return $this->armCircumference;
    }

    public function setArmCircumference(?int $armCircumference): self
    {
        $this->armCircumference = $armCircumference;

        return $this;
    }

    public function getThighCircumference(): ?int
    {
        return $this->thighCircumference;
    }

    public function setThighCircumference(?int $thighCircumference): self
    {
        $this->thighCircumference = $thighCircumference;

        return $this;
    }

    public function getIsMilestone(): ?bool
    {
        return $this->isMilestone;
    }

    public function setIsMilestone(bool $isMilestone): self
    {
        $this->isMilestone = $isMilestone;

        return $this;
    }
}
