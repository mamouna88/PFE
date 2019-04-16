<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
    /**
     * @Route("/inscription", name="inscription")
     */
    public function register(): Response
    {
        return $this->render('contact/register.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
    /**
     * @Route("/paiement", name="paiement")
     */
    public function pay(): Response
    {
        return $this->render('contact/paiement.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
