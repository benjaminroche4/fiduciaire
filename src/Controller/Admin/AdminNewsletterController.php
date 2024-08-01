<?php

namespace App\Controller\Admin;

use App\Repository\ContactRepository;
use App\Repository\NewsletterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class AdminNewsletterController extends AbstractController
{
    public function __construct(
        private readonly NewsletterRepository $newsletterRepository,
    )
    {
    }

    #[Route('/admin/newsletter', name: 'app_admin_newsletter')]
    public function newsletter():Response
    {
        $usersList = $this->newsletterRepository->findAll();

        return $this->render('admin/newsletter.html.twig', [
            'usersList' => $usersList,
        ]);
    }
}