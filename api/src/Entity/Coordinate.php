<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CoordinateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CoordinateRepository::class)
 */
class Coordinate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $latitude;

    /**
     * @ORM\Column(type="integer")
     */
    private $longitude;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitude(): ?int
    {
        return $this->latitude;
    }

    public function setLatitude(int $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?int
    {
        return $this->longitude;
    }

    public function setLongitude(int $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }
}
