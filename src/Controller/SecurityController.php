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
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends Controller
{
    /**
     * @Route("/registeration", name="registration")
     */

    public function registration(Request $request, ObjectManager $manager, 
                                 UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer)
    {
        $user = new User();
        $form = $this->createFormBuilder($user)
                ->add('UserName')
                ->add('PassWord', PasswordType::class)
                ->add('Mail', EmailType::class)
                ->getForm();
        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $message = (new \Swift_Message('Thanks For Your Registration !'))
                        ->setFrom('darksider218@gmail.com')
                        ->setTo($user->getMail())
                        ->setBody(
                            $this->renderView(
                                'email/registration.html.twig', [
                                'user' => $user,
                                ]
                                )); 
                $mailer->send($message);            
                $hash = $encoder->encodePassword($user, $user->getPassWord());
                $user->setPassWord($hash);
                $manager->persist($user);
                $manager->flush();
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
