<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfficeController extends AbstractController
{
    #[Route('/fiduciaire/geneve', name: 'app_office_geneva')]
    public function officeGeneva(): Response
    {
        return $this->render('office/office_geneva.html.twig');
    }

    #[Route('/fiduciaire/lausanne', name: 'app_office_lausanne')]
    public function officeLausanne(): Response
    {
        return $this->render('office/office_lausanne.html.twig');
    }

    #[Route('/fiduciaire/bale', name: 'app_office_bale')]
    public function officeBale(): Response
    {
        return $this->render('office/office_bale.html.twig');
    }
}
