<?php

namespace App\Controller\Admin;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class AdminContactController extends AbstractController
{
    public function __construct(
        private readonly ContactRepository $contactRepository,
    )
    {
    }

    #[Route('/admin/contact', name: 'app_admin_contact')]
    public function blog():Response
    {
        $lastContacts = $this->contactRepository->findLatest();

        return $this->render('admin/contact.html.twig', [
            'lastContacts' => $lastContacts,
        ]);
    }
}