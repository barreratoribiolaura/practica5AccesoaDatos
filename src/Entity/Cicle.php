<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cicle
 *
 * @ORM\Table(name="cicle")
 * @ORM\Entity
 */
class Cicle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="codi", type="string", length=5, nullable=true)
     */
    private $codi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Centre", inversedBy="cicle")
     * @ORM\JoinTable(name="cicle_centre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cicle_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="centre_id", referencedColumnName="id")
     *   }
     * )
     */
    private $centre = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->centre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getCodi(): ?string
    {
        return $this->codi;
    }

    /**
     * @param string|null $codi
     */
    public function setCodi(?string $codi): void
    {
        $this->codi = $codi;
    }

    /**
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * @param string|null $nom
     */
    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
     */
    public function getCentre()
    {
        return $this->centre;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $centre
     */
    public function setCentre($centre): void
    {
        $this->centre = $centre;
    }

}
