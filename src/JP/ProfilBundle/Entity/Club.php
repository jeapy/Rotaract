<?php

namespace JP\ProfilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="JP\ProfilBundle\Repository\ClubRepository")
 */
class Club
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
     * @ORM\Column(name="typeclub", type="string", length=255)
     */
    private $typeclub;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=255)
     */
    private $designation;


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
     * Set typeclub
     *
     * @param string $typeclub
     *
     * @return Club
     */
    public function setTypeclub($typeclub)
    {
        $this->typeclub = $typeclub;

        return $this;
    }

    /**
     * Get typeclub
     *
     * @return string
     */
    public function getTypeclub()
    {
        return $this->typeclub;
    }

    /**
     * Set designation
     *
     * @param string $designation
     *
     * @return Club
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
}
