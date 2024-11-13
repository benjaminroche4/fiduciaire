<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\NewsletterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends AbstractController
{
    #[Route('/newsletter', name: 'app_newsletter', options: ['sitemap' => ['priority' => 0.7]])]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $newsletter = new Newsletter();
        $form = $this->createForm(NewsletterType::class, $newsletter);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $newsletter->setCreatedAt(new \DateTimeImmutable());
            $entityManager->persist($newsletter);
            $entityManager->flush();

            $this->addFlash('newsletterSuccess', 'Merci pour votre inscription.');
            return $this->redirectToRoute('app_newsletter');
        }

        return $this->render('newsletter/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
