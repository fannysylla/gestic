<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\Session;
use App\Entity\Apprenant;
use App\Form\SessionType;
use App\Entity\Referentiel;
use App\Form\ApprenantType;
use App\Form\AjoutReferentielType;
use App\Repository\UserRepository;
use App\Repository\SessionRepository;
use App\Repository\ApprenantRepository;
use App\Repository\ReferentielRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AssistanteDirectionController extends AbstractController
{
    /**
     * @Route("/ad/referentiel", name="ad.referentiel.liste")
     */
    public function listeReferentiel(ReferentielRepository $repo)
    {
        $referentiels=$repo->findAll();
        return $this->render('assistante_direction/referentiel/liste.html.twig', [
            'referentiels' => $referentiels,
        ]);
    }
    /**
     * @Route("/ad/referentiel/creer", name="ad.referentiel.creer")
     */
    public function creerReferentiel(Request $request)
    {
        $referentiel=new Referentiel();
        $form = $this->createForm(AjoutReferentielType::class, $referentiel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($referentiel);
            $entityManager->flush();
    
            return $this->redirectToRoute('ad.referentiel.liste');
        }
        return $this->render('assistante_direction/referentiel/form.html.twig', [
            'form' => $form->createView(),

        ]);
    }
    /**
     * @Route("/ad/referentiel/edit/{id}", name="ad.referentiel.edit")
     */
    public function editReferentiel($id,Request $request,ReferentielRepository $repo)
    {
        $referentiel=$repo->find($id);
        $form = $this->createForm(AjoutReferentielType::class, $referentiel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($referentiel);
            $entityManager->flush();
    
            return $this->redirectToRoute('ad.referentiel.liste');
        }
        return $this->render('assistante_direction/referentiel/form.html.twig', [
            'form' => $form->createView(),

        ]);
    }
    /**
     * @Route("/ad/referentiel/delete/{id}", name="ad.referentiel.delete")
     */
    public function deleteReferentiel($id,ReferentielRepository $repo)
    {
        $referentiel=$repo->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($referentiel);
        $entityManager->flush();

        return $this->redirectToRoute('ad.referentiel.liste');
    }

    








    /**
     * @Route("/ad/session/liste", name="ad.session.liste")
     */
    public function listeSession(SessionRepository $repo)
    {
        $sessions=$repo->findAll();
        return $this->render('assistante_direction/session/liste.html.twig', [
            'sessions' => $sessions,
        ]);
    }
    /**
     * @Route("/ad/session/creer", name="ad.session.creer")
     */
    public function creerSession(Request $request)
    {
        $session=new Session();
        $form = $this->createForm(SessionType::class, $session);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($session);
            $entityManager->flush();
    
            return $this->redirectToRoute('ad.session.liste');
        }
        return $this->render('assistante_direction/session/form.html.twig', [
            'form' => $form->createView(),

        ]);
    }
    /**
     * @Route("/ad/session/edit/{id}", name="ad.session.edit")
     */
    public function editSession($id,Request $request,SessionRepository $repo)
    {
        $session=$repo->find($id);
        $form = $this->createForm(SessionType::class, $session);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($session);
            $entityManager->flush();
    
            return $this->redirectToRoute('ad.session.liste');
        }
        return $this->render('assistante_direction/session/form.html.twig', [
            'form' => $form->createView(),

        ]);
    }
    /**
     * @Route("/ad/session/delete/{id}", name="ad.session.delete")
     */
    public function deleteSession($id,SessionRepository $repo)
    {
        $session=$repo->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($session);
        $entityManager->flush();

        return $this->redirectToRoute('ad.session.liste');
    }









    /**
     * @Route("/ad/user", name="ad.user.liste")
     */
    public function listeUser(UserRepository $repo)
    {
        $users=$repo->findAll();
        return $this->render('assistante_direction/user/liste.html.twig', [
            'users' => $users,
        ]);
    }
    /**
     * @Route("/ad/user/creer", name="ad.user.creer")
     */
    public function creerUser(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user=new User();
        $form = $this->createForm(UserType::class, $user);
        $form->add('creer', SubmitType::class, [
            'attr' => ['class' => 'btn btn-primary'],
        ]);
        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $user->setRoles(['ROLE_ASSISTANT_DIRECTION']);
            $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));
            $entityManager->persist($user);
            $entityManager->flush();
    
            return $this->redirectToRoute('ad.user.liste');
        }
        return $this->render('assistante_direction/user/form.html.twig', [
            'form' => $form->createView(),

        ]);
    }
    /**
     * @Route("/ad/user/edit/{id}", name="ad.user.edit")
     */
    public function editUser($id,Request $request,UserRepository $repo)
    {
        $user=$repo->find($id);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
    
            return $this->redirectToRoute('ad.user.liste');
        }
        return $this->render('assistante_direction/user/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/ad/user/delete/{id}", name="ad.user.delete")
     */
    public function deleteUser($id,UserRepository $repo)
    {
        $user=$repo->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('ad.user.liste');
    }




 /**
     * @Route("/ad/apprenant", name="ad.apprenant.liste")
     */
    public function listeApprenant(ApprenantRepository $repo)
    {
        $apprenants=$repo->findAll();
        return $this->render('assistante_direction/apprenant/liste.html.twig', [
            'apprenants' => $apprenants,
        ]);
    }
    /**
     * @Route("/ad/apprenant/creer", name="ad.apprenant.creer")
     */
    public function creerApprenant(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $apprenant=new Apprenant();
        $form = $this->createForm(ApprenantType::class, $apprenant);
        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $apprenant->getUser()->setRoles(['ROLE_APPRENANT']);
            $entityManager->persist($apprenant);
            $entityManager->flush();
    
            return $this->redirectToRoute('ad.apprenant.liste');
        }
        
        return $this->render('assistante_direction/apprenant/form.html.twig', [
            'form' => $form->createView(),

        ]);
    }

    /**
     * @Route("/ad/apprenant/edit/{id}", name="ad.apprenant.edit")
     */
    public function editApprenant($id,Request $request,ApprenantRepository $repo)
    {
        $apprenant=$repo->find($id);
        $form = $this->createForm(ApprenantType::class, $apprenant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($apprenant);
            $entityManager->flush();
    
            return $this->redirectToRoute('ad.apprenant.liste');
        }
        return $this->render('assistante_direction/apprenant/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/ad/apprenant/delete/{id}", name="ad.apprenant.delete")
     */
    public function deleteApprenant($id,ApprenantRepository $repo)
    {
        $apprenant=$repo->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($apprenant);
        $entityManager->flush();

        return $this->redirectToRoute('ad.apprenant.liste');
    }

    
}


