<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{

    private PostsRepository $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    #[Route('/blog', name: 'app_blog')]
    public function blogList(): Response
    {
        $allPosts = $this->postsRepository->findAllPublished();

        return $this->render('blog/blog_list.html.twig', [
            'allPosts' => $allPosts
        ]);
    }

    #[Route('/blog/{slug}', name: 'app_blog_post')]
    public function blogPost(string $slug): Response
    {
        $post = $this->postsRepository->findOneBy(['slug' => $slug]);
        $recommendedPosts = $this->postsRepository->findRecommendedPosts($post);

        if (!$post || !$post->isStatus()) {
            throw $this->createNotFoundException('404, Page non trouvée');
        }

        return $this->render('blog/blog_post.html.twig', [
            'post' => $post,
            'recommendedPosts' => $recommendedPosts,
        ]);
    }
}
