<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompagnyController extends AbstractController
{
    #[Route('/services-fiduciaire', name: 'app_services_fiduciaire')]
    public function servicesFiduciaire(): Response
    {
        return $this->render('compagny/services-fiduciaire.html.twig');
    }

    #[Route('/a-propos', name: 'app_a_propos')]
    public function aPropos(): Response
    {
        return $this->render('compagny/a-propos.html.twig');
    }

    #[Route('/conseil-entreprise', name: 'app_conseil_entreprise')]
    public function conseilEntreprise(): Response
    {
        return $this->render('compagny/conseil-entreprise.html.twig');
    }

    #[Route('/audit-et-controles', name: 'app_audit_et_controles')]
    public function auditEtControles(): Response
    {
        return $this->render('compagny/audit-et-controles.html.twig');
    }

    #[Route('/audit-et-controles/controle-restreint', name: 'app_controle_restreint')]
    public function controleRestreint(): Response
    {
        return $this->render('compagny/controle-restreint.html.twig');
    }
}
