<?php

namespace JP\ProfilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disponibilite
 *
 * @ORM\Table(name="disponibilite")
 * @ORM\Entity(repositoryClass="JP\ProfilBundle\Repository\DisponibiliteRepository")
 */
class Disponibilite
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
     * @ORM\Column(name="jour", type="string", length=255)
     */
    private $jour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="time")
     */
    private $heure;

    /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\Profil", cascade={"persist"},inversedBy="disponibilite")
    * @ORM\JoinColumn(nullable=false)
    * 
    */
    private $profil;
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
     * Set jour
     *
     * @param string $jour
     *
     * @return Disponibilite
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return string
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set heure
     *
     * @param \DateTime $heure
     *
     * @return Disponibilite
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return \DateTime
     */
    public function getHeure()
    {
        return $this->heure;
    }

  

    /**
     * Set profil
     *
     * @param \JP\ProfilBundle\Entity\Profil $profil
     *
     * @return Disponibilite
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
