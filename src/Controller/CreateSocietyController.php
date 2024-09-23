<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateSocietyController extends AbstractController
{
    #[Route('/creation-de-societe/SARL', name: 'app_create_society_SARL')]
    public function sarl(): Response
    {
        return $this->render('create_society/sarl.html.twig');
    }
}
