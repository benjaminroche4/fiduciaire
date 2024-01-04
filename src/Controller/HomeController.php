<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private readonly PostsRepository $postsRepository
    )
    {
    }

    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        $posts = $this->postsRepository->findLastThree();

        return $this->render('home/index.html.twig', [
            'posts' => $posts,
        ]);
    }
}
