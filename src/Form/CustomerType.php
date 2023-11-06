<?php

namespace App\Form;

use App\Entity\Customer;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;


class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                ],
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne doit pas être vide.',
                    ]),
                    new Assert\Email([
                        'message' => 'Votre adresse email est invalide.',
                    ]),
                ],
            ])
            ->add('phone', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                ],
            ])
            ->add('society', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                ],
            ])
            ->add('legalStatus', ChoiceType::class, [
                'choices'  => [
                    'SA' => 'SA',
                    'SARL' => 'SARL',
                    'Fondation' => 'Fondation',
                    'Association' => 'Association',
                    'Autres' => 'Autres',
                ],
                'placeholder' => 'Faites votre choix...',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                ],
            ])
            ->add('numberEmployees', ChoiceType::class, [
                'choices'  => [
                    '1-2 employés' => '1-2 employés',
                    '2-5 employés' => '2-5 employés',
                    '5-10 employés' => '5-10 employés',
                    '>20 employés' => '>20 employés',
                ],
                'placeholder' => 'Faites votre choix...',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                ],
            ])
            ->add('localitySociety', ChoiceType::class, [
                'choices'  => [
                    'Suisse' => 'Suisse',
                    'Étranger UE' => 'Étranger UE',
                    'Étranger hors UE' => 'Étranger hors UE',
                ],
                'placeholder' => 'Faites votre choix...',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                ],
            ])
            ->add('position', ChoiceType::class, [
                'choices'  => [
                    'Administrateur' => 'Administrateur',
                    'C-level' => 'C-level',
                    'Directeur - Responsable de département' => 'Directeur - Responsable de département',
                    'Fonction finance' => 'Fonction Finance',
                    'Fonction RH' => 'Fonction RH',
                ],
                'placeholder' => 'Faites votre choix...',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                ],
            ])
            ->add('accept', CheckboxType::class, [
                'constraints' => [
                    new Assert\IsTrue([
                        'message' => 'Vous devez accepter les conditions.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
