<?php

namespace JP\ProfilBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Profil
 *
 * @ORM\Table(name="profil")
 * @ORM\Entity(repositoryClass="JP\ProfilBundle\Repository\ProfilRepository")
 */
class Profil
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;


    /**
     * @var \DateTime
     *
     *@ORM\Column(name="datenaiss", type="date",nullable=true)
     */
    private $datenaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255 ,nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="profiltype", type="string", length=255)
     */
    private $profiltype;

    /**
     * @var string
     *
     * @ORM\Column(name="domicile", type="string", length=255 ,nullable=true)
     */
    private $domicile;

    /**
     * @var string
     *
     * @ORM\Column(name="entrecole", type="string", length=255 ,nullable=true)
     */
    private $entrecole;

    /**
     * @var \DateTime
     *
     *@ORM\Column(name="datintro", type="date" ,nullable=true)
     */
    private $datintro;

    /**
     * @var string
     *
     * @ORM\Column(name="postprecedent", type="string", length=255 ,nullable=true)
     */
    private $postprecedent;

    /**
     * @var string
     *
     * @ORM\Column(name="postactuel", type="string", length=255 ,nullable=true)
     */
    private $postactuel;

    /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\Profil")
    * 
    */
    private $inviteby;

    /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\Profession", cascade={"persist"})
    * 
    */
   private $profession ;

   /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\Club")
    * 
    */
   private $club ;

    /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\MoyenCom", cascade={"persist"})
    * 
    * 
    */
   private $moyencommunication ;

  

   /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\Formation", cascade={"persist"})
    * 
    */
   private $formation;

   /**
    * @ORM\ManyToOne(targetEntity="JP\ProfilBundle\Entity\Fonction", cascade={"persist"})
    * 
    */
   private $fonction;

   /**
    * @ORM\OneToOne(targetEntity="JP\ProfilBundle\Entity\Conjoint", cascade={"persist"})
    * 
    */
   private $conjoint;

    /**
    * @ORM\ManyToOne(targetEntity="JP\CotisationBundle\Entity\Cotisation", cascade={"persist"})
    * 
    */
   private $cotisation;

   /**
    * @ORM\ManyToMany(targetEntity="JP\ReunionBundle\Entity\Reunion", cascade={"persist"} ,mappedBy="profil")
    * @ORM\JoinTable(name="reunion_profil")
    */

    private $reunion;


    /**
     * @ORM\OneToMany(targetEntity="JP\ProfilBundle\Entity\Disponibilite",cascade={"persist"}, mappedBy="profil")
     */

    private $disponibilite;


    /**
     * @ORM\OneToMany(targetEntity="JP\ProfilBundle\Entity\Enfant",cascade={"persist"}, mappedBy="profil")
     */

    private $enfant;

    /**
     * @ORM\OneToMany(targetEntity="JP\ProfilBundle\Entity\Mail",cascade={"persist"}, mappedBy="profil")
     */

    private $mail;

    /**
     * @ORM\OneToMany(targetEntity="JP\ProfilBundle\Entity\Numero",cascade={"persist"}, mappedBy="profil")
     */

    private $numero;

     /**
     * @ORM\OneToMany(targetEntity="JP\MainBundle\Entity\Presence",cascade={"persist"}, mappedBy="profil")
     */

    private $presence;


    private $file;
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
     * Set code
     *
     * @param string $code
     *
     * @return Profil
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Profil
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Profil
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set datenaiss
     *
     * @param string $datenaiss
     *
     * @return Profil
     */
    public function setDatenaiss($datenaiss)
    {
        $this->datenaiss = $datenaiss;

        return $this;
    }

    /**
     * Get datenaiss
     *
     * @return string
     */
    public function getDatenaiss()
    {
        return $this->datenaiss;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Profil
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set domicile
     *
     * @param string $domicile
     *
     * @return Profil
     */
    public function setDomicile($domicile)
    {
        $this->domicile = $domicile;

        return $this;
    }

    /**
     * Get domicile
     *
     * @return string
     */
    public function getDomicile()
    {
        return $this->domicile;
    }

    /**
     * Set entrecole
     *
     * @param string $entrecole
     *
     * @return Profil
     */
    public function setEntrecole($entrecole)
    {
        $this->entrecole = $entrecole;

        return $this;
    }

    /**
     * Get entrecole
     *
     * @return string
     */
    public function getEntrecole()
    {
        return $this->entrecole;
    }

    /**
     * Set datintro
     *
     * @param string $datintro
     *
     * @return Profil
     */
    public function setDatintro($datintro)
    {
        $this->datintro = $datintro;

        return $this;
    }

    /**
     * Get datintro
     *
     * @return string
     */
    public function getDatintro()
    {
        return $this->datintro;
    }

    /**
     * Set postprecedent
     *
     * @param string $postprecedent
     *
     * @return Profil
     */
    public function setPostprecedent($postprecedent)
    {
        $this->postprecedent = $postprecedent;

        return $this;
    }

    /**
     * Get postprecedent
     *
     * @return string
     */
    public function getPostprecedent()
    {
        return $this->postprecedent;
    }

    /**
     * Set postactuel
     *
     * @param string $postactuel
     *
     * @return Profil
     */
    public function setPostactuel($postactuel)
    {
        $this->postactuel = $postactuel;

        return $this;
    }

    /**
     * Get postactuel
     *
     * @return string
     */
    public function getPostactuel()
    {
        return $this->postactuel;
    }

    /**
     * Set inviteby
     *
     * @param \JP\ProfilBundle\Entity\Profil $inviteby
     *
     * @return Profil
     */
    public function setInviteby(\JP\ProfilBundle\Entity\Profil $inviteby = null )
    {
        $this->inviteby = $inviteby;

        return $this;
    }

    /**
     * Get inviteby
     *
     * @return string
     */
    public function getInviteby()
    {
        return $this->inviteby;
    }

    /**
     * Set profession
     *
     * @param \JP\ProfilBundle\Entity\Profession $profession
     *
     * @return Profil
     */
    public function setProfession(\JP\ProfilBundle\Entity\Profession $profession = null)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return \JP\ProfilBundle\Entity\Profession
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set club
     *
     * @param \JP\ProfilBundle\Entity\Club $club
     *
     * @return Profil
     */
    public function setClub(\JP\ProfilBundle\Entity\Club $club = null)
    {
        $this->club = $club;

        return $this;
    }

    /**
     * Get club
     *
     * @return \JP\ProfilBundle\Entity\Club
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * Set moyencommunication
     *
     * @param \JP\ProfilBundle\Entity\MoyenCom $moyencommunication
     *
     * @return Profil
     */
    public function setMoyencommunication(\JP\ProfilBundle\Entity\MoyenCom $moyencommunication = null)
    {
        $this->moyencommunication = $moyencommunication;

        return $this;
    }

    /**
     * Get moyencommunication
     *
     * @return \JP\ProfilBundle\Entity\MoyenCom
     */
    public function getMoyencommunication()
    {
        return $this->moyencommunication;
    }

   

    /**
     * Set formation
     *
     * @param \JP\ProfilBundle\Entity\Formation $formation
     *
     * @return Profil
     */
    public function setFormation(\JP\ProfilBundle\Entity\Formation $formation = null)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return \JP\ProfilBundle\Entity\Formation
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set fonction
     *
     * @param \JP\ProfilBundle\Entity\Fonction $fonction
     *
     * @return Profil
     */
    public function setFonction(\JP\ProfilBundle\Entity\Fonction $fonction = null)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return \JP\ProfilBundle\Entity\Fonction
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set conjoint
     *
     * @param \JP\ProfilBundle\Entity\Conjoint $conjoint
     *
     * @return Profil
     */
    public function setConjoint(\JP\ProfilBundle\Entity\Conjoint $conjoint = null)
    {
        $this->conjoint = $conjoint;

        return $this;
    }

    /**
     * Get conjoint
     *
     * @return \JP\ProfilBundle\Entity\Conjoint
     */
    public function getConjoint()
    {
        return $this->conjoint;
    }

    
    /**
     * Set profiltype
     *
     * @param string $profiltype
     *
     * @return Profil
     */
    public function setProfiltype($profiltype)
    {
        $this->profiltype = $profiltype;

        return $this;
    }

    /**
     * Get profiltype
     *
     * @return string
     */
    public function getProfiltype()
    {
        return $this->profiltype;
    }




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reunion = new ArrayCollection();

        $this->disponibilite = new ArrayCollection();

        $this->enfant = new ArrayCollection();

        $this->mail = new ArrayCollection();

        $this->numero = new ArrayCollection();
    }

    /**
     * Add reunion
     *
     * @param \JP\ReunionBundle\Entity\Reunion $reunion
     *
     * @return Profil
     */
    public function addReunion(\JP\ReunionBundle\Entity\Reunion $reunion)
    {
        $this->reunion[] = $reunion;

        return $this;
    }

    /**
     * Remove reunion
     *
     * @param \JP\ReunionBundle\Entity\Reunion $reunion
     */
    public function removeReunion(\JP\ReunionBundle\Entity\Reunion $reunion)
    {
        $this->reunion->removeElement($reunion);
    }

    /**
     * Get reunion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReunion()
    {
        return $this->reunion;
    }


    /**
     * Add disponibilite
     *
     * @param \JP\ProfilBundle\Entity\Disponibilite $disponibilite
     *
     * @return Profil
     */
    public function addDisponibilite(\JP\ProfilBundle\Entity\Disponibilite $disponibilite)
    {
        $this->disponibilite[] = $disponibilite;        

        $disponibilite->setProfil($this);  

     
      return $this;     
    }

    /**
     * Remove disponibilite
     *
     * @param \JP\ProfilBundle\Entity\disponibilite $disponibilite
     */
    public function removeDisponibilite(\JP\ProfilBundle\Entity\Disponibilite $disponibilite)
    {
        $this->disponibilite->removeElement($disponibilite);
    }

    /**
     * Get disponibilite
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }


    /**
     * Add enfant
     *
     * @param \JP\EnfantBundle\Entity\Enfant $enfant
     *
     * @return Profil
     */
    public function addEnfant(\JP\ProfilBundle\Entity\Enfant $enfant)
    {
        $this->enfant[] = $enfant;

        $enfant->setProfil($this);

        return $this;
    }

    /**
     * Remove enfant
     *
     * @param \JP\ProfilBundle\Entity\Enfant $enfant
     */
    public function removeEnfant(\JP\ProfilBundle\Entity\Enfant $enfant)
    {
        $this->enfant->removeElement($enfant);
    }

    /**
     * Get enfant
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnfant()
    {
        return $this->enfant;


    }
    

    /**
     * Add mail
     *
     * @param \JP\ProfilBundle\Entity\Mail $mail
     *
     * @return Profil
     */
    public function addMail(\JP\ProfilBundle\Entity\Mail $mail)
    {
        $this->mail[] = $mail;

        $mail->setProfil($this);

        return $this;
    }

    /**
     * Remove mail
     *
     * @param \JP\ProfilBundle\Entity\Mail $mail
     */
    public function removeMail(\JP\ProfilBundle\Entity\Mail $mail)
    {
        $this->mail->removeElement($mail);
    }

    /**
     * Get mail
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMail()
    {
        return $this->mail;
    }


     /**
     * Add numero
     *
     * @param \JP\ProfilBundle\Entity\Numero $numero
     *
     * @return Profil
     */
    public function addNumero(\JP\ProfilBundle\Entity\Numero $numero)
    {
        $this->numero[] = $numero;

        $numero->setProfil($this);

        return $this;
    }

    /**
     * Remove numero
     *
     * @param \JP\ProfilBundle\Entity\Numero $numero
     */
    public function removeNumero(\JP\ProfilBundle\Entity\Numero $numero)
    {
        $this->numero->removeElement($numero);
    }

    /**
     * Get numero
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set cotisation
     *
     * @param \JP\CotisationBundle\Entity\Cotisation $cotisation
     *
     * @return Profil
     */
    public function setCotisation(\JP\CotisationBundle\Entity\Cotisation $cotisation = null)
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
     * Add presence
     *
     * @param \JP\MainBundle\Entity\Presence $presence
     *
     * @return Profil
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

    


        // On ajoute cet attribut pour y stocker le nom du fichier temporairement

  private $tempFilename;



     public function getFile()
      {
        return $this->file;
      }


   
  // On modifie le setter de File, pour prendre en compte l'upload d'un fichier lorsqu'il en existe déjà un autre

  public function setFile(UploadedFile $file)
  {
    $this->file = $file;
    // On vérifie si on avait déjà un fichier pour cette entité
    if (null !== $this->image) {
      // On sauvegarde l'extension du fichier pour le supprimer plus tard
      $this->tempFilename = $this->image;
      // On réinitialise les valeurs des attributs image 
      $this->image = null;
     
    }
  }
  /**
   * @ORM\PrePersist()
   * @ORM\PreUpdate
   */

  public function preUpload()
  {
    // Si jamais il n'y a pas de fichier (champ facultatif), on ne fait rien
    if (null === $this->file) {
      return;
    }

    // Le nom du fichier est son id, on doit juste stocker également son extension
    // Pour faire propre, on devrait renommer cet attribut en « extension », plutôt que « image »
    $this->image = $this->file->guessExtension();
    
  }


  /**
   * @ORM\PostPersist()
   * @ORM\PostUpdate()
   */

  public function upload()
  {
    // Si jamais il n'y a pas de fichier (champ facultatif), on ne fait rien
    if (null === $this->file) {
      return;
    }
    // Si on avait un ancien fichier, on le supprime
    if (null !== $this->tempFilename) {
      $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;
      if (file_exists($oldFile)) {
        unlink($oldFile);
      }

    }

    // On déplace le fichier envoyé dans le répertoire de notre choix
    $this->file->move(
      $this->getUploadRootDir(), // Le répertoire de destination
      $this->id.'.'.$this->image   // Le nom du fichier à créer, ici « id.extension »
    );

  }


  /**
   * @ORM\PreRemove()
   */

  public function preRemoveUpload()
  {
    // On sauvegarde temporairement le nom du fichier, car il dépend de l'id
    $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->image;
  }


  /**
   * @ORM\PostRemove()
   */

  public function removeUpload()
  {
    // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
    if (file_exists($this->tempFilename)) {
      // On supprime le fichier
      unlink($this->tempFilename);
    }
  }


  public function getUploadDir()
  {
    // On retourne le chemin relatif vers l'image pour un navigateur
    return 'uploads/img';
  }

  protected function getUploadRootDir()
  {
    // On retourne le chemin relatif vers l'image pour notre code PHP
    return __DIR__.'/../../../../web/'.$this->getUploadDir();
  }

  public function getWebPath()
  {
    return $this->getUploadDir().'/'.$this->getId().'.'.$this->getImage();
  }
}
