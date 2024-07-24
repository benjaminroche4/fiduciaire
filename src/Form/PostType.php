<?php

namespace App\Form;

use App\Entity\PostCategories;
use App\Entity\Posts;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                    new Assert\Length([
                        'max' => 60,
                        'maxMessage' => 'Ce champ doit faire au max. 60 caractères.',
                    ])
                ],
            ])
            ->add('content', TextareaType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                ],
            ])
            ->add('status', CheckboxType::class, [
                'required' => false,
            ])
            ->add('summary', TextareaType::class, [
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                    new Assert\Length([
                        'max' => 4096,
                        'maxMessage' => 'Ce champ doit faire au max. 255 caractères.',
                    ])
                ],
            ])
            ->add('mainPhoto', FileType::class, [
                'data_class' => null,
                'constraints' => [
                    new Assert\File([
                        'maxSize' => '200k',
                        'mimeTypes' => [
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Seuls les fichiers de type webp sont autorisés.',
                    ]),
                ],
            ])
            ->add('authorName', ChoiceType::class, [
                'placeholder' => '',
                'choices' => [
                    'Christian Favre' => 'Christian Favre',
                    'Alice Meier' => 'Alice Meier',
                ],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                ],
            ])
            ->add('category', EntityType::class, [
                'placeholder' => '',
                'class' => PostCategories::class,
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Ce champ ne ne doit pas être vide.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Posts::class,
        ]);
    }
}
