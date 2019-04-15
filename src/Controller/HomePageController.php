<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/home/page", name="home_page")
     */
    public function index()
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }

    /**
     * @Route ("/about")
     * @return Response
     */
    public function About():Response
    {
        return $this->render('about.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
