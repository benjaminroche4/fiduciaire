<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Customer;
use App\Form\ContactType;
use App\Form\CustomerType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/devenir-client', name: 'app_devenir_client')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Customer();
        $form = $this->createForm(CustomerType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contact->setCreatedAt(new \DateTimeImmutable());
            $entityManager->persist($contact);
            $entityManager->flush();

            $this->addFlash('contactSuccess', 'Nous avons bien reçu votre inscription. Un collaborateur va prendre contact avec vous rapidement.');
            return $this->redirectToRoute('app_contact');
        }

        return $this->render('customer/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
