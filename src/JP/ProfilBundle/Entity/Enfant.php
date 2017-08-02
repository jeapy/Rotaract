<?php

namespace JP\ProfilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enfant
 *
 * @ORM\Table(name="enfant")
 * @ORM\Entity(repositoryClass="JP\ProfilBundle\Repository\EnfantRepository")
 */
class Enfant
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
     * @ORM\Column(name="nomprenom", type="string", length=255)
     */
    private $nomprenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datenaissance", type="date")
     */
    private $datenaissance;

    /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\Profil", cascade={"persist"},inversedBy="enfant")
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
     * Set nomprenom
     *
     * @param string $nomprenom
     *
     * @return Enfant
     */
    public function setNomprenom($nomprenom)
    {
        $this->nomprenom = $nomprenom;

        return $this;
    }

    /**
     * Get nomprenom
     *
     * @return string
     */
    public function getNomprenom()
    {
        return $this->nomprenom;
    }

    /**
     * Set datenaissance
     *
     * @param \DateTime $datenaissance
     *
     * @return Enfant
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return \DateTime
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * Set profil
     *
     * @param \JP\ProfilBundle\Entity\Profil $profil
     *
     * @return Enfant
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
