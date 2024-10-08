<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteMapController extends AbstractController
{
    public function __construct(
        private readonly PostsRepository $postsRepository
    )
    {
    }

    #[Route('/sitemap', name: 'app_site_map')]
    public function sitemap(): Response
    {
        $posts = $this->postsRepository->findAll();

        return $this->render('site_map/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
