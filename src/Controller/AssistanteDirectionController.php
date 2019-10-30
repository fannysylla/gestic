<?php

namespace App\Controller;

use App\Entity\Referentiel;
use App\Form\AjoutReferentielType;
use App\Repository\ReferentielRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AssistanteDirectionController extends AbstractController
{
    /**
     * @Route("/ad/referentiel", name="ad.refrentiel.liste")
     */
    public function listeReferentiel(ReferentielRepository $repo)
    {
        $referentiels=$repo->findAll();
        return $this->render('assistante_direction/referentiel/liste.html.twig', [
            'referentiels' => $referentiels,
        ]);
    }
     /**
     * @Route("/ad/referentiel/creer", name="ad.refrentiel.creer")
     */
    public function creerReferentiel(Request $request)
    {
        $referentiel=new Referentiel();
        $form = $this->createForm(AjoutReferentielType::class, $referentiel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();gi
            $entityManager->persist($referentiel);
            $entityManager->flush();
    
            return $this->redirectToRoute('ad.refrentiel.liste');
        }
        return $this->render('assistante_direction/referentiel/form.html.twig', [
            'form' => $form->createView(),

        ]);
    }
     /**
     * @Route("/ad/referentiel/edit", name="ad.refrentiel.edit")
     */
    public function editReferentiel()
    {
        return $this->render('assistante_direction/referentiel/index.html.twig', [
            'controller_name' => 'AssistanteDirectionController',
        ]);
    }
    /**
     * @Route("/ad/referentiel/delete", name="ad.refrentiel.delete")
     */
    public function deleteReferentiel()
    {
        return $this->render('assistante_direction/referentiel/index.html.twig', [
            'controller_name' => 'AssistanteDirectionController',
        ]);
    }
}
