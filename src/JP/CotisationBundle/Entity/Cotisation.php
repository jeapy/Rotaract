<?php

namespace JP\CotisationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cotisation
 *
 * @ORM\Table(name="cotisation")
 * @ORM\Entity(repositoryClass="JP\CotisationBundle\Repository\CotisationRepository")
 */
class Cotisation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="typecotisation", type="string", length=255)
     */
    private $typecotisation;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="string", length=255)
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecreation", type="datetime")
     */
    private $datecreation;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
         
    }

 public function __construct()  {   
     $this->datecreation = new \Datetime();
 }
 
    /**
     * Set typecotisation
     *
     * @param string $typecotisation
     *
     * @return Cotisation
     */
    public function setTypecotisation($typecotisation)
    {
        $this->typecotisation = $typecotisation;

        return $this;
    }

    /**
     * Get typecotisation
     *
     * @return string
     */
    public function getTypecotisation()
    {
        return $this->typecotisation;
    }

    /**
     * Set montant
     *
     * @param string $montant
     *
     * @return Cotisation
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set datecreation
     *
     * @param \DateTime $datecreation
     *
     * @return Cotisation
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return \DateTime
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }
}

