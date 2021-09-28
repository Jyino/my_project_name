<?php

namespace App\Controller;

use App\Entity\Prestation;
use App\Entity\TypePrestation;
use App\Form\TypePrestationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;



class TypePrestationController extends AbstractController
{
    /**
     * @Route("/typeprestation/nouveau", name="typeprestationnouveau")
     * @Route("/typeprestation/{id}/edit", name="typeprestationmaj")
     */
    public function Gestiontypeprestation(TypePrestation $typePrestation = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$typePrestation)
        {$typePrestation = new TypePrestation();}
        
 
        $form = $this->createForm(TypePrestationType::class,$typePrestation);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid())) //vérifie des test de cyber sécurité
        {
            
            $manager->persist($typePrestation);//persit prépare la requête sql 
            //si ça passe flush envoie dans la base de donnée
            
            $manager->flush(); //envoie dans base de donnée (mAJ)
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('typeprestation/GestionTypePrestation.html.twig', [
            'form' => $form->createView(),
            'editmode' => $typePrestation->getId() !== null
        ]);
    }

}
