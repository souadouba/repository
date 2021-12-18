<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Entity\Images;

use App\Repository\AnnoncesRepository;

use App\Form\AnnoncesType;
use App\Form\EditerProfileType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Dompdf\Dompdf;
use Dompdf\Options;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'users')]
    public function index(): Response
    {
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }

    /**
     * @Route("/users/profil/modifier", name="users_profil_modifier")
     */
    public function editProfile(Request $request, AnnoncesRepository $annoncesRepository)
    {
        if($request->isMethod('POST')){   

            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();

            $user->setNom($request->request->get('nom'));
            $user->setPrenom($request->request->get('prenom'));
            $user->setEmail($request->request->get('email'));
            $user->setTelephone($request->request->get('telephone'));
            $em->flush();

            $this->addFlash('message', 'Profil mis à jour');
            return $this->redirectToRoute('users');
        }

        return $this->render('users/editer.html.twig');
    }

    /**
     * @Route("/users/addresse/modifier", name="users_addresse_modifier")
     */
    public function editAdres(Request $request, AnnoncesRepository $annoncesRepository)
    {
        if($request->isMethod('POST')){   

            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $user->setAddresse($request->request->get('addresse'));
            $user->setVille($request->request->get('ville'));
            $em->flush();

            $this->addFlash('message', 'Profil mis à jour');
            return $this->redirectToRoute('users');
        }

        return $this->render('users/editer.html.twig');
    }

      /**
     * @Route("/users/pass/modifier", name="users_pass_modifier")
     */
    public function editPass(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {

        $user = $this->getUser();
        $form = $this->createForm(EditerProfileType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('message', 'Profil mis à jour');
            return $this->redirectToRoute('users');
        }

        return $this->render('users/editerpasse.html.twig', [
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/users/annonces/ajout", name="users_annonces_ajout")
     */
    public function ajoutAnnonce( Request $request, AnnoncesRepository $annoncesRepository)
    {

        $annonce = new Annonces();
        $form = $this->createForm(AnnoncesType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonce->setUsers($this->getUser());
            $annonce->setActive(false);
           
            $entityManager = $this->getDoctrine()->getManager();
            // On récupère les images transmises
            $images = $form->get('images')->getData();
            // On boucle sur les images
        foreach($images as $image){
            // On récupère les images transmises
            // On génère un nouveau nom de fichier
            $fichier = md5(uniqid()) . '.' . $image->guessExtension();
            // On copie le fichier dans le dossier uploads
            $image->move(
                $this->getParameter('images_directory'),
                $fichier
            );

            // On stocke l'image dans la base de données (son nom)
            $img = new Images();
            $img =$img->setNom($fichier);
            $annonce->addImage($img);   
            }

            $entityManager->persist($annonce);
            $entityManager->flush();

            return $this->redirectToRoute('pub');
        }

        return $this->render('users/annonces/ajout.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/users/annonces/edit/{id}", name="users_annonces_edit")
     */
    public function editAnnonce(Annonces $annonce, Request $request, AnnoncesRepository $annoncesRepository)
    {

        $this->denyAccessUnlessGranted('annonce_edit', $annonce);
        $form = $this->createForm(AnnoncesType::class, $annonce);

        $form->handleRequest($request);

        $panier = $session->get("panier", []);

        if ($form->isSubmitted() && $form->isValid()) {
            $annonce->setUsers($this->getUsers());
            $annonce->setActive(false);
            // On récupère les images transmises
            $images = $form->get('images')->getData();
            // On boucle sur les images
        foreach($images as $image){
            // On génère un nouveau nom de fichier
            $fichier = md5(uniqid()) . '.' . $image->guessExtension();
            // On copie le fichier dans le dossier uploads
            $image->move(
                $this->getParameter('images_directory'),
                $fichier
                );
            // On stocke l'image dans la base de données (son nom)
                $img = new Images();
                $img->setNom($fichier);
                $annonce->addImage($img);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            return $this->redirectToRoute('users');
        }

        return $this->render('users/annonces/ajout.html.twig', [
            'form' => $form->createView(),
            'annonce' => $annonce
        ]);
    }

    /**
     * @Route("/supprime/image/{id}", name="annonces_delete_image", methods={"DELETE"})
     */
    public function deleteImage(Images $image, Request $request){
        $data = json_decode($request->getContent(), true);

        // On vérifie si le token est valide
        if($this->isCsrfTokenValid('delete'.$image->getId(), $data['_token'])){
            // On récupère le nom de l'image
            $nom = $image->getNom();
            // On supprime le fichier
            unlink($this->getParameter('images_directory').'/'.$nom);

            // On supprime l'entrée de la base
            $em = $this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush();

            // On répond en json
            return new JsonResponse(['success' => 1]);
        }else{
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }

    /**
     * @Route("/users/annonces/pub", name="pub")
     */
    public function pub(Request $request, AnnoncesRepository $annoncesRepository)
    {   
        return $this->render('users/annonces/pub.html.twig', [
            'annonces' => $annoncesRepository->findALL()
        ]);
    }

}
