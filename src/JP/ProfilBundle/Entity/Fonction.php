<?php

namespace JP\ProfilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fonction
 *
 * @ORM\Table(name="fonction")
 * @ORM\Entity(repositoryClass="JP\ProfilBundle\Repository\FonctionRepository")
 */
class Fonction
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
     * @ORM\Column(name="designation", type="string", length=255 , nullable=true)
     */
    private $designation;

    /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\Organe")
    * 
    */
    private $organe;

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
     * Set designation
     *
     * @param string $designation
     *
     * @return Fonction
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get designation
     *
     * @return string
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set organe
     *
     * @param \JP\ProfilBundle\Entity\Organe $organe
     *
     * @return Fonction
     */
    public function setOrgane(\JP\ProfilBundle\Entity\Organe $organe = null)
    {
        $this->organe = $organe;

        return $this;
    }

    /**
     * Get organe
     *
     * @return \JP\ProfilBundle\Entity\Organe
     */
    public function getOrgane()
    {
        return $this->organe;
    }
}
