<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{
    #[Route('/services-fiduciaire', name: 'app_services_fiduciaire', options: ['sitemap' => ['priority' => 0.9]])]
    public function servicesFiduciaire(): Response
    {
        return $this->render('company/services-fiduciaire.html.twig');
    }

    #[Route('/a-propos', name: 'app_a_propos', options: ['sitemap' => ['priority' => 0.6]])]
    public function aPropos(): Response
    {
        return $this->render('company/a-propos.html.twig');
    }

    #[Route('/conseil-entreprise', name: 'app_conseil_entreprise', options: ['sitemap' => ['priority' => 0.9]])]
    public function conseilEntreprise(): Response
    {
        return $this->render('company/conseil-entreprise.html.twig');
    }

    #[Route('/audit-et-controles', name: 'app_audit_et_controles', options: ['sitemap' => ['priority' => 0.9]])]
    public function auditEtControles(): Response
    {
        return $this->render('company/audit-et-controles.html.twig');
    }

    #[Route('/audit-et-controles/controle-restreint', name: 'app_controle_restreint', options: ['sitemap' => ['priority' => 0.7]])]
    public function controleRestreint(): Response
    {
        return $this->render('company/controle-restreint.html.twig');
    }

    #[Route('/services-fiduciaire/comptabilite', name: 'app_comptabilite', options: ['sitemap' => ['priority' => 0.7]])]
    public function comptabilite(): Response
    {
        return $this->render('company/comptabilite.html.twig');
    }

    #[Route('/corporate-finance', name: 'app_corporate_finance', options: ['sitemap' => ['priority' => 0.9]])]
    public function corporateFinance(): Response
    {
        return $this->render('company/corporate-finance.html.twig');
    }

    #[Route('/faq', name: 'app_faq', options: ['sitemap' => ['priority' => 0.6]])]
    public function faq(): Response
    {
        return $this->render('company/faq.html.twig');
    }

    #[Route('/services-fiduciaire/rh-et-gestion-des-salaires', name: 'app_rh', options: ['sitemap' => ['priority' => 0.7]])]
    public function rhGestionSalaires(): Response
    {
        return $this->render('company/rh-gestion-salaires.html.twig');
    }

    #[Route('/services-fiduciaire/fiscalite', name: 'app_fiscalite', options: ['sitemap' => ['priority' => 0.7]])]
    public function fiscalite(): Response
    {
        return $this->render('company/fiscalite.html.twig');
    }

    #[Route('/services-fiduciaire/administration-de-societes', name: 'app_admin_societes', options: ['sitemap' => ['priority' => 0.7]])]
    public function adminSociete(): Response
    {
        return $this->render('company/administration-societes.html.twig');
    }

    #[Route('/services-fiduciaire/audit-et-controles', name: 'app_services_audit_controles', options: ['sitemap' => ['priority' => 0.7]])]
    public function auditControle(): Response
    {
        return $this->render('company/audit-controles.html.twig');
    }

    #[Route('/services-fiduciaire/gestion-des-debiteurs', name: 'app_gestion_debiteurs', options: ['sitemap' => ['priority' => 0.7]])]
    public function gestionDebiteurs(): Response
    {
        return $this->render('company/gestion-debiteurs.html.twig');
    }
}
