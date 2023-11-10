<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Customer;
use App\Form\ContactType;
use App\Form\CustomerType;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/devenir-client', name: 'app_devenir_client')]
    public function devenirClient(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer, LoggerInterface $logger): Response
    {
        $contact = new Customer();
        $form = $this->createForm(CustomerType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contact->setCreatedAt(new \DateTimeImmutable());
            $entityManager->persist($contact);
            $entityManager->flush();

            $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('contact@uniflow.agency')
                ->subject('[Fiduciaire Genevoise] Nouvelle demande pour devenir client')
                ->htmlTemplate('emails/devenir-client.html.twig')
                ->context([
                    'createdAt' => new \DateTimeImmutable(),
                    'fistName' => $contact->getFirstName(),
                    'lastName' => $contact->getLastName(),
                    'society' => $contact->getSociety(),
                    'email' => $contact->getEmail(),
                    'phone' => $contact->getPhone(),
                    'position' => $contact->getPosition(),
                    'numberEmployees' => $contact->getNumberEmployees(),
                    'localitySociety' => $contact->getLocalitySociety(),
                    'legalStatus' => $contact->getLegalStatus(),
                ])
            ;

            try {
                $mailer->send($email);
            } catch (TransportExceptionInterface $e) {
                $logger->error('Erreur lors de l\'envoi de l\'email :'. $e->getMessage());
            }

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
