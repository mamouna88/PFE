<?php

namespace App\Controller;

use App\Form\AdherentType;
use App\Form\RoleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('contact/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    /**
     * @Route("/connect", name="connect")
     * @param Request $request
     * @return RedirectResponse | Response
     */
    public function connect(Request $request): Response
    {
        $form = $this->createForm(RoleType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dump($form->getData());
            die('remplir les champs');
        }
        return $this->render('contact/connect.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }

        /**
         * @Route("/register2", name="register")
         * @param Request $request
         * @return RedirectResponse | Response
         */
        public function register(Request $request): Response
        {
            $form = $this->createForm(AdherentType::class);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                dump($form->getData());
                die('veuillez vous inscrire');
            }
            return $this->render('contact/register.html.twig', [
                'contactForm' => $form->createView(),
            ]);
        }

        /**
         * @Route("/pay", name="pay")
         */
        public
        function pay(): Response
        {
            return $this->render('contact/pay.html.twig', [
                'controller_name' => 'ContactController',
            ]);
        }

}
