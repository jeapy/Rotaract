<?php

namespace JP\ReunionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Reunion
 *
 * @ORM\Table(name="reunion")
 * @ORM\Entity(repositoryClass="JP\ReunionBundle\Repository\ReunionRepository")
 */
class Reunion
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
     * @ORM\Column(name="datereunion", type="datetime")
     */
    private $datereunion;
    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="typereunion", type="string", length=255)
     */
    private $typereunion;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=255)
     */
    private $objet;

    /**
    * @ORM\ManyToOne(targetEntity="JP\UserBundle\Entity\User", cascade={"persist"})
    * 
    */
   private $createdBy ;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdat", type="datetime")
     */
   private $createdAt ;

     /**
     * @ORM\OneToMany(targetEntity="JP\MainBundle\Entity\Presence",cascade={"persist"}, mappedBy="reunion")
     */

    private $presence;

    /**
    * @ORM\ManyToMany(targetEntity="JP\ProfilBundle\Entity\Profil", cascade={"persist"} ,inversedBy="reunion")
    * 
    */
    private $profil;


    public function __construct()  {   
        
        $this->createdAt = new \Datetime();
        $this->profil = new ArrayCollection();
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
     * Set datereunion
     *
     * @param \DateTime $datereunion
     *
     * @return Reunion
     */
    public function setDatereunion($datereunion)
    {
        $this->datereunion = $datereunion;

        return $this;
    }

    /**
     * Get datereunion
     *
     * @return \DateTime
     */
    public function getDatereunion()
    {
        return $this->datereunion;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Reunion
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set typereunion
     *
     * @param string $typereunion
     *
     * @return Reunion
     */
    public function setTypereunion($typereunion)
    {
        $this->typereunion = $typereunion;

        return $this;
    }

    /**
     * Get typereunion
     *
     * @return string
     */
    public function getTypereunion()
    {
        return $this->typereunion;
    }

    /**
     * Set objet
     *
     * @param string $objet
     *
     * @return Reunion
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Reunion
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdBy
     *
     * @param \JP\UserBundle\Entity\User $createdBy
     *
     * @return Reunion
     */
    public function setCreatedBy(\JP\UserBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \JP\UserBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Add presence
     *
     * @param \JP\MainBundle\Entity\Presence $presence
     *
     * @return Reunion
     */
    public function addPresence(\JP\MainBundle\Entity\Presence $presence)
    {
        $this->presence[] = $presence;

        return $this;
    }

    /**
     * Remove presence
     *
     * @param \JP\MainBundle\Entity\Presence $presence
     */
    public function removePresence(\JP\MainBundle\Entity\Presence $presence)
    {
        $this->presence->removeElement($presence);
    }

    /**
     * Get presence
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPresence()
    {
        return $this->presence;
    }

    /**
     * Add profil
     *
     * @param \JP\ProfilBundle\Entity\Profil $profil
     *
     * @return Reunion
     */
    public function addProfil(\JP\ProfilBundle\Entity\Profil $profil)
    {
        $this->profil[] = $profil;

        return $this;
    }

    /**
     * Remove profil
     *
     * @param \JP\ProfilBundle\Entity\Profil $profil
     */
    public function removeProfil(\JP\ProfilBundle\Entity\Profil $profil)
    {
        $this->profil->removeElement($profil);
    }

    /**
     * Get profil
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfil()
    {
        return $this->profil;
    }
}
