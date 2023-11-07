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
    public function devenirClient(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Customer();
        $form = $this->createForm(CustomerType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contact->setCreatedAt(new \DateTimeImmutable());
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('app_devenir_client_traitement');
        }

        return $this->render('customer/devenir-client.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/devenir-client/traitement', name: 'app_devenir_client_traitement')]
    public function devenirClientTraitement(): Response
    {
        return $this->render('customer/traitement.html.twig');
    }
}
