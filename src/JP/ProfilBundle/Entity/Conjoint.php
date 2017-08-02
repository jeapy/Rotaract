<?php

namespace JP\ProfilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conjoint
 *
 * @ORM\Table(name="conjoint")
 * @ORM\Entity(repositoryClass="JP\ProfilBundle\Repository\ConjointRepository")
 */
class Conjoint
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
     * @ORM\Column(name="nomprenom", type="string", length=255,nullable=true)
     */
    private $nomprenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datenaissance", type="date",nullable=true)
     */
    private $datenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=255,nullable=true)
     */
    private $contact;


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
     * @return Conjoint
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
     * @return Conjoint
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
     * Set contact
     *
     * @param string $contact
     *
     * @return Conjoint
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }
}
