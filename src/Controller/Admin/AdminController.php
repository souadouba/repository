<?php

namespace App\Controller\Admin;


use App\Entity\Categories;
use App\Entity\Users;

use App\Form\CategoriesType;
use App\Form\EditUsersType;

use App\Repository\CategoriesRepository;
use App\Repository\UsersRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin_")
 * @package App\Controller\Admin
 */
class AdminController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    /**
     * @Route("/categories/ajout", name="categories_ajout")
     */
    public function ajoutCategorie(Request $request)
    {
        $categorie = new Categories;

        $form = $this->createForm(CategoriesType::class, $categorie);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('admin_home');
        }

        return $this->render('admin/categories/ajout.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
 * @Route("/users", name="users")
 */
public function userList(UsersRepository $users)
{
    return $this->render('admin/users/user.html.twig', [
        'users' => $users->findAll(),
    ]);
}

/**
 * @Route("/users/modifier/{id}", name="modifier_utilisateur")
 */
public function editUser(Users $users, Request $request)
{
    $form = $this->createForm(EditUsersType::class, $users);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($users);
        $entityManager->flush();

        $this->addFlash('message', 'Utilisateur modifié avec succès');
        return $this->redirectToRoute('admin_users');
    }
    
    return $this->render('admin/users/edituser.html.twig', [
        'usersForm' => $form->createView(),
    ]);
}

}

