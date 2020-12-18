<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app")
     */
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            'pageName' => 'AppController',
        ]);
    }
    /**
     * @Route("/landing", name="landing")
     */
    public function landing(): Response
    {
        return $this->render('app/landing.html.twig', [
            'pageName' => 'AppController',
        ]);
    }
    /**
     * @Route("/element", name="element")
     */
    public function element(): Response
    {
        return $this->render('app/elements.html.twig', [
            'pageName' => 'AppController',
        ]);
    }

    /**
     * @Route("/left_sidebar", name="left_sidebar")
     */
    public function leftSidebar(): Response
    {
        return $this->render('app/left-sidebar.html.twig', [
            'pageName' => 'AppController',
        ]);
    }

    /**
     * @Route("/right_sidebar", name="right_sidebar")
     */
    public function rightSidebar(): Response
    {
        return $this->render('app/right-sidebar.html.twig', [
            'pageName' => 'AppController',
        ]);
    }


    /**
     * @Route("/no_sidebar", name="no_sidebar")
     */
    public function noSidebar(): Response
    {
        return $this->render('app/no-sidebar.html.twig', [
            'pageName' => 'AppController',
        ]);
    }
}
