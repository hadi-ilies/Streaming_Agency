<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class SecurityController extends Controller
{
    /**
     * @Route("/registeration", name="registration")
     */

    public function registration(Request $request, ObjectManager $manager)
    {
        $user = new User();
        $form = $this->createFormBuilder($user)
                ->add('UserName')
                ->add('PassWord', PasswordType::class)
                ->add('Mail', EmailType::class)
                ->getForm();
        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $manager->persist($user);
                $manager->flush();
                //must send mail
                return ($this->redirectToRoute('login'));
            }
            return $this->render('registration/registration.html.twig', [ 
            'form' => $form->createView(),
            ]
        ); 
    }

    /**
     * @Route("/login", name="login")
     */

    public function index()
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logout() {}
}
