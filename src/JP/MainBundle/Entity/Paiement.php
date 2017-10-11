<?php

namespace JP\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table(name="paiement")
 * @ORM\Entity(repositoryClass="JP\MainBundle\Repository\PaiementRepository")
 */
class Paiement
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
     * @var \DateTime
     *
     * @ORM\Column(name="datepaiement", type="datetime")
     */
    private $datepaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="string", length=255)
     */
    private $montant;


     /**
    * @ORM\ManyToOne(targetEntity="JP\CotisationBundle\Entity\Cotisation", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */

    private $cotisation;

    /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\Profil", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    * 
    */
    private $profil;

     public function __construct()  {   
        
        $this->datepaiement = new \Datetime();
      
  }



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
     * Set datepaiement
     *
     * @param \DateTime $datepaiement
     *
     * @return Paiement
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

    /**
     * Set montant
     *
     * @param string $montant
     *
     * @return Paiement
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
     * Set cotisation
     *
     * @param \JP\CotisationBundle\Entity\Cotisation $cotisation
     *
     * @return Paiement
     */
    public function setCotisation(\JP\CotisationBundle\Entity\Cotisation $cotisation)
    {
        $this->cotisation = $cotisation;

        return $this;
    }

    /**
     * Get cotisation
     *
     * @return \JP\CotisationBundle\Entity\Cotisation
     */
    public function getCotisation()
    {
        return $this->cotisation;
    }

    /**
     * Set profil
     *
     * @param \JP\ProfilBundle\Entity\Profil $profil
     *
     * @return Paiement
     */
    public function setProfil(\JP\ProfilBundle\Entity\Profil $profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return \JP\ProfilBundle\Entity\Profil
     */
    public function getProfil()
    {
        return $this->profil;
    }
}
