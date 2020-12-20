<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/particulier", name="particulier_")
 */
class ParticulierController extends AbstractController
{
    /**
     * @Route("/thd", name="thd")
     */
    public function thd(): Response
    {
        return $this->render('particulier/thd.html.twig', [
            'pageName' => 'AppController',
        ]);
    }
    /**
     * @Route("/techno", name="techno")
     */
    public function techno(): Response
    {
        return $this->render('particulier/techno.html.twig', [
            'pageName' => 'AppController',
        ]);
    }
    /**
     * @Route("/offres", name="offres")
     */
    public function offres(): Response
    {
        return $this->render('particulier/offres.html.twig', [
            'pageName' => 'AppController',
        ]);
    }
}
