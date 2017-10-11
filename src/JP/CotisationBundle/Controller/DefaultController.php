<?php

namespace JP\CotisationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JP\CotisationBundle\Entity\Cotisation;
use JP\ProfilBundle\Entity\Profil;
use JP\MainBundle\Entity\Paiement;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JPCotisationBundle:Default:index.html.twig');
    }

     public function indexPaiementAction()
    {
    	$em = $this->getDoctrine()->getManager();

        $cotisations = $em->getRepository('JPCotisationBundle:Cotisation')->findAll();

        return $this->render('JPCotisationBundle:Paiement:index.html.twig', array(
            'cotisations' => $cotisations,
        ));
    }

     public function addPaiementAction(Cotisation $cotisation)
    {
        $em = $this->getDoctrine()->getManager();     

        $profils = $em->getRepository('JPProfilBundle:Profil')->FindMemberProfil('1','2');

        $payeurs = $em->getRepository('JPMainBundle:Paiement')->findByCotisation(array('id' => $cotisation));

        return $this->render('JPCotisationBundle:Paiement:paiementAdd.html.twig', array(
            'cotisation' => $cotisation,
            'profils' 	 => $profils,
            'payeurs' 	 => $payeurs
           
        ));
    }


     public function payementAction(Request $request, Cotisation $cotisation )
    {      

        $em = $this->getDoctrine()->getManager();
        $form = $this->cotisationForm($cotisation);
        $form->handleRequest($request); 

        	 if ($form->isSubmitted() && $form->isValid() ) {
          $data = $form->getData();
          $profil = $em->getRepository('JPProfilBundle:Profil')->find($data['profil']);           
          $profils = $em->getRepository('JPProfilBundle:Profil')->findProfilByCode($data['profil'],$data['code']);
                  
                  if($profils){
                        $paiement = new Paiement();

                        $paiement->setProfil($profil);
                        $paiement->setCotisation($cotisation);
                        $paiement->setMontant($data['montant']); 
                       
                        $em->persist($paiement);          
                        $em->flush();

                  }else{
                    $request->getSession()->getFlashBag()->add('notice', 'Votre "code" est erroné');
                    }            
       }
       
      return $this->redirectToRoute('jp_cotisation_paiement_add' , array('id' => $cotisation->getId()));
    }

    private function cotisationForm(Cotisation $cotisation)
    {
        return $this->createFormBuilder()
            ->add('montant',TextType::class)        
            ->add('profil',TextType::class)
            ->add('code',TextType::class)
            
            ->setAction($this->generateUrl('jp_cotisation_payer', array('id' =>$cotisation->getId())))
            ->getForm()
        ;
    }


    public function payementshowAction(Cotisation $cotisation , Profil $profil )
    {
        $em = $this->getDoctrine()->getManager();
     
	   $cform = $this->cotisationForm($cotisation);
	  
	    $profils = $em->getRepository('JPProfilBundle:Profil')->FindMemberProfil('1','2');

	     $payeurs = $em->getRepository('JPMainBundle:Paiement')->findByCotisation(array('id' => $cotisation));

	        return $this->render('JPCotisationBundle:Paiement:payementshow.html.twig', array(
	            'cotisation' => $cotisation,
	            'profil' => $profil,
	            'profils' =>$profils ,
	            'payeurs' =>    $payeurs,
	            'cform'  => $cform->createView()        

	           
        ));
}



}