<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateSocietyController extends AbstractController
{
    #[Route('/creation-de-societe/societe-a-responsabilite-limitee', name: 'app_create_society_SARL', options: ['sitemap' => ['priority' => 0.7]])]
    public function sarl(): Response
    {
        return $this->render('create_society/sarl.html.twig');
    }

    #[Route('/creation-de-societe/societe-anonyme', name: 'app_create_society_SA', options: ['sitemap' => ['priority' => 0.7]])]
    public function sa(): Response
    {
        return $this->render('create_society/sa.html.twig');
    }

    #[Route('/creation-de-societe/raison-individuelle', name: 'app_create_society_RI', options: ['sitemap' => ['priority' => 0.7]])]
    public function ri(): Response
    {
        return $this->render('create_society/ri.html.twig');
    }
}
