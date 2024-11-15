<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalController extends AbstractController
{
    #[Route('/donnees-personnelles', name: 'app_donnees_personnelles', options: ['sitemap' => ['priority' => 0.2]])]
    public function donnesPersonnelles(): Response
    {
        return $this->render('legal/donnees-personnelles.html.twig');
    }

    #[Route('/mentions-legales', name: 'app_mentions_legales', options: ['sitemap' => ['priority' => 0.2]])]
    public function mentionsLegales(): Response
    {
        return $this->render('legal/mentions-legales.html.twig');
    }
}
