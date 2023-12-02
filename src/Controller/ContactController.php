<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer, LoggerInterface $logger): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contact->setCreatedAt(new \DateTimeImmutable());
            $entityManager->persist($contact);
            $entityManager->flush();

            $emailContact = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to(new Address('contact@fiduciaire-genevoise.ch'))
                ->subject('[Fiduciaire Genevoise] Nouvelle demande de contact')
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'createdAt' => new \DateTimeImmutable(),
                    'fistName' => $contact->getFirstName(),
                    'lastName' => $contact->getLastName(),
                    'society' => $contact->getSociety(),
                    'emailContact' => $contact->getEmail(),
                    'phone' => $contact->getPhone(),
                    'message' => $contact->getMessage(),
                    'help' => $contact->getHelp(),
                ])
            ;

            try {
                $mailer->send($emailContact);
            } catch (TransportExceptionInterface $e) {
                $logger->error('Erreur lors de l\'envoi de l\'email :'. $e->getMessage());
            }

            $this->addFlash('contactSuccess', 'Message envoyé. Un collaborateur va prendre contact avec vous rapidement.');
            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
