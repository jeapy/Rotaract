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
     * @ORM\Column(name="datepaiement", type="datetime")
     */
    private $datepaiement;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * Set datepaiement
     *
     * @param \DateTime $datepaiement
     *
     * @return Cotisation
     */
    public function setDatepaiement($datepaiement)
    {
        $this->datepaiement = $datepaiement;

        return $this;
    }

    /**
     * Get datepaiement
     *
     * @return \DateTime
     */
    public function getDatepaiement()
    {
        return $this->datepaiement;
    }
}

