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
    public function home()
    {
        return $this->render('home.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
    /**
     * @Route("/home/project", name="home_project")
     */
    public function project()
    {
        return $this->render('project.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }

    /**
     * @Route ("/home/about")
     * @return Response
     */
    public function About():Response
    {
        return $this->render('about.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
