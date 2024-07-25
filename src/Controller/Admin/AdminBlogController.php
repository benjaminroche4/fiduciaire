<?php

namespace App\Controller\Admin;

use App\Entity\Posts;
use App\Form\PostType;
use App\Repository\PostsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;

#[IsGranted('ROLE_ADMIN')]
class AdminBlogController extends AbstractController
{
    public function __construct(
        private readonly PostsRepository $postRepository,
        private readonly SluggerInterface $slugger,
        private readonly LoggerInterface $logger
    )
    {
    }

    #[Route('/admin/blog', name: 'app_admin_blog')]
    public function blog(): Response
    {
        $posts = $this->postRepository->findBy([], ['createdAt' => 'DESC']);

        return $this->render('admin/blog/blog.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/admin/blog/nouveau', name: 'app_admin_blog_new')]
    public function blogNew(Request $request, EntityManagerInterface $entityManager): Response
    {
        $post = new Posts();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $slug = $this->slugger->slug($post->getTitle())->lower();
            $post->setSlug($slug);

            //size max
            //only webp
            //Main Photo traitement
            $photoFile = $form->get('mainPhoto')->getData();

            if ($photoFile) {
                $safeFilename = $this->slugger->slug($slug);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$photoFile->guessExtension();

                try {
                    $photoFile->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->logger->error('Failed to upload photo: '.$e->getMessage());
                }

                $post->setMainPhoto($newFilename);
            }

            //Author Name and Profile Photo traitement
            $authorName = $form->get('authorName')->getData();

            if ($authorName == 'Christian Favre') {
                $post->setAuthorName('Christian Favre');
                $post->setAuthorJob('Rédacteur');
                $post->setAuthorProfilePhoto('pp_christian_favre.webp');
            } elseif ($authorName == 'Alice Meier') {
                $post->setAuthorName('Alice Meier');
                $post->setAuthorJob('Rédactrice');
                $post->setAuthorProfilePhoto('pp_alice_meier.webp');
            }

            $post->setCreatedAt(new \DateTimeImmutable());
            $post->setStatus($form->get('status')->getData());

            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_blog');
        }


        return $this->render('admin/blog/blog_new.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}