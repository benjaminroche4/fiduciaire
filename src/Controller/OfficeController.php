<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfficeController extends AbstractController
{
    public function __construct(
        private readonly PostsRepository $postsRepository
    )
    {
    }

    #[Route('/fiduciaire/geneve', name: 'app_office_geneva', options: ['sitemap' => ['priority' => 0.7]])]
    public function officeGeneva(): Response
    {
        $posts = $this->postsRepository->findLastThree();

        return $this->render('office/office_geneva.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/fiduciaire/lausanne', name: 'app_office_lausanne', options: ['sitemap' => ['priority' => 0.7]])]
    public function officeLausanne(): Response
    {
        $posts = $this->postsRepository->findLastThree();

        return $this->render('office/office_lausanne.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/fiduciaire/bale', name: 'app_office_bale', options: ['sitemap' => ['priority' => 0.7]])]
    public function officeBale(): Response
    {
        $posts = $this->postsRepository->findLastThree();

        return $this->render('office/office_bale.html.twig', [
            'posts' => $posts,
        ]);
    }
}
