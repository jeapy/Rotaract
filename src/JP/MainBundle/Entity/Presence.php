<?php

namespace JP\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presence
 *
 * @ORM\Table(name="presence")
 * @ORM\Entity(repositoryClass="JP\MainBundle\Repository\PresenceRepository")
 */
class Presence
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
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

 /**
    * @ORM\ManyToOne(targetEntity="JP\ReunionBundle\Entity\Reunion", cascade={"persist"},inversedBy="presence")
    * @ORM\JoinColumn(nullable=false)
    */

    private $reunion;

    /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\Profil", cascade={"persist"},inversedBy="presence")
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
     * Set etat
     *
     * @param string $etat
     *
     * @return Presence
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set reunion
     *
     * @param \JP\ReunionBundle\Entity\Reunion $reunion
     *
     * @return Presence
     */
    public function setReunion(\JP\ReunionBundle\Entity\Reunion $reunion)
    {
        $this->reunion = $reunion;

        return $this;
    }

    /**
     * Get reunion
     *
     * @return \JP\ReunionBundle\Entity\Reunion
     */
    public function getReunion()
    {
        return $this->reunion;
    }

    /**
     * Set profil
     *
     * @param \JP\ProfilBundle\Entity\Profil $profil
     *
     * @return Presence
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
