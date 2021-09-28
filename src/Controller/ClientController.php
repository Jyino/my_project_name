<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 
use Doctrine\ORM\EntityManagerInterface;    

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     */
    public function index(): Response
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }

     /**
     * @Route("/client/nouveau", name="clientnnouveau")
     * @Route("/client/{id}/edit", name="clientmaj")
     */
    public function Gestiontypeclient(ClientType $client = null,
    Request $request,  
    EntityManagerInterface $manager)
    {
        
        if(!$client)
        {$client = new client();}
        
 
        $form = $this->createForm(ClientType::class,$client);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            $manager->persist($client);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('client/Gestionclient.html.twig', [
            'form' => $form->createView(),
            'editmode' => $client->getId() !== null
        ]);
    }
}