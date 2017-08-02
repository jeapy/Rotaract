<?php
// /app/src/ourcodeworld/Extensions/OCWServices.php
// Don't forget to change the namespace acording to the path and the parent bundle.
namespace JP\ProfilBundle\MyServices;
// don't forget the namespaces too !
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;

// This will be the name of the class and the file
class MemberCount {
    protected $em;
    private $container;
    
    // We need to inject this variables later.
    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }
    
    
    
public function CountMember($idA,$idB){
		  $qb = $this->em->createQueryBuilder();

		  $qb->select('a')
		  	 ->from('JPProfilBundle:Profil', 'a')
		     ->Where('a.profiltype = :idA')
		    	 ->setParameter('idA', $idA)
		     ->orWhere('a.profiltype = :idB ')		   
		  		  ->setParameter('idB', $idB)
		     ->getQuery();

		   
 $total = $qb ->select('COUNT(a)')
               ->getQuery()
               ->getSingleScalarResult();

            return $total ;

		}
    
}