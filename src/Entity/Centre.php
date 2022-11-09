<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Centre
 *
 * @ORM\Table(name="centre", uniqueConstraints={@ORM\UniqueConstraint(name="codi", columns={"codi"})}, indexes={@ORM\Index(name="fk_provincia_centre1_idx", columns={"provincia_id"}), @ORM\Index(name="fk_regim_centre1_idx", columns={"regim_id"})})
 * @ORM\Entity
 */
class Centre
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
     * @var string
     *
     * @ORM\Column(name="codi", type="string", length=8, nullable=false)
     */
    private $codi = '';

    /**
     * @var string|null
     *
     * @ORM\Column(name="centre", type="string", length=150, nullable=true)
     */
    private $centre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="direccio", type="string", length=200, nullable=true)
     */
    private $direccio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="localitat", type="string", length=150, nullable=true)
     */
    private $localitat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telefon", type="string", length=12, nullable=true)
     */
    private $telefon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="query", type="string", length=255, nullable=true)
     */
    private $query;

    /**
     * @var Regim
     *
     * @ORM\ManyToOne(targetEntity="Regim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="regim_id", referencedColumnName="id")
     * })
     */
    private $regim;

    /**
     * @var Provincia
     *
     * @ORM\ManyToOne(targetEntity="Provincia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provincia_id", referencedColumnName="id")
     * })
     */
    private $provincia;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cicle", mappedBy="centre")
     */
    private $cicle = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cicle = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return string
     */
    public function getCodi(): string
    {
        return $this->codi;
    }

    /**
     * @param string $codi
     */
    public function setCodi(string $codi): void
    {
        $this->codi = $codi;
    }

    /**
     * @return string|null
     */
    public function getCentre(): ?string
    {
        return $this->centre;
    }

    /**
     * @param string|null $centre
     */
    public function setCentre(?string $centre): void
    {
        $this->centre = $centre;
    }

    /**
     * @return string|null
     */
    public function getDireccio(): ?string
    {
        return $this->direccio;
    }

    /**
     * @param string|null $direccio
     */
    public function setDireccio(?string $direccio): void
    {
        $this->direccio = $direccio;
    }

    /**
     * @return string|null
     */
    public function getLocalitat(): ?string
    {
        return $this->localitat;
    }

    /**
     * @param string|null $localitat
     */
    public function setLocalitat(?string $localitat): void
    {
        $this->localitat = $localitat;
    }

    /**
     * @return string|null
     */
    public function getTelefon(): ?string
    {
        return $this->telefon;
    }

    /**
     * @param string|null $telefon
     */
    public function setTelefon(?string $telefon): void
    {
        $this->telefon = $telefon;
    }

    /**
     * @return string|null
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @param string|null $query
     */
    public function setQuery(?string $query): void
    {
        $this->query = $query;
    }

    /**
     * @return Regim
     */
    public function getRegim(): Regim
    {
        return $this->regim;
    }

    /**
     * @param Regim $regim
     */
    public function setRegim(Regim $regim): void
    {
        $this->regim = $regim;
    }

    /**
     * @return Provincia
     */
    public function getProvincia(): Provincia
    {
        return $this->provincia;
    }

    /**
     * @param Provincia $provincia
     */
    public function setProvincia(Provincia $provincia): void
    {
        $this->provincia = $provincia;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
     */
    public function getCicle()
    {
        return $this->cicle;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $cicle
     */
    public function setCicle($cicle): void
    {
        $this->cicle = $cicle;
    }

}
