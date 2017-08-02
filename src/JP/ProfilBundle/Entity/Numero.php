<?php

namespace JP\ProfilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Numero
 *
 * @ORM\Table(name="numero")
 * @ORM\Entity(repositoryClass="JP\ProfilBundle\Repository\NumeroRepository")
 */
class Numero
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
     * @ORM\Column(name="operateur", type="string", length=255)
     */
    private $operateur;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="string", length=255)
     */
    private $valeur;

    /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\Profil", cascade={"persist"}, inversedBy="numero")
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
     * Set operateur
     *
     * @param string $operateur
     *
     * @return Numero
     */
    public function setOperateur($operateur)
    {
        $this->operateur = $operateur;

        return $this;
    }

    /**
     * Get operateur
     *
     * @return string
     */
    public function getOperateur()
    {
        return $this->operateur;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     *
     * @return Numero
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set profil
     *
     * @param \JP\ProfilBundle\Entity\Profil $profil
     *
     * @return Numero
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
