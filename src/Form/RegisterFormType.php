<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label'     => 'Votre prénom',
                'required'  => true,
                'trim'      => true,
                'constraints' => new Length(5, 2, 30),
                'attr'      => [
                    'placeholder'       => 'Jean',
                    'class'             => 'form-input'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label'     => 'Votre Nom',
                'required'  => true,
                'constraints' => new Length(5, 2, 30),
                'attr'      => [
                    'placeholder'       => 'Dupond',
                    'class'             => 'form-input'
                ]
            ])
            ->add('username', TextType::class, [
                'label'     => 'Votre pseudo',
                'required'  => true,
                'attr'      => [
                    'placeholder'       => 'Jean Dupond 4',
                    'class'             => 'form-input'
                ]
            ])
                ->add('email', EmailType::class, [
                    'label'     => 'Votre adresse Email',
                    'required'  => true,
                    'trim'      => true,
                    'constraints' => new Length(10, 6, 60),
                    'attr'      => [
                        'placeholder'       => 'Jean.dupond@gmail.com',
                        'class'             => 'form-input'
                    ]
                ])

                ->add('password', RepeatedType::class, [
                    'type'  => PasswordType::class,
                    'invalid_message'   => 'Les mots de passe doivent être identiques',
                    'label'     => 'Votre mot de passe',
                    'required'  => true,
                    'first_options' =>[
                        'label'     => 'mot de passe',
                        'attr'      => [
                            'placeholder'       => 'Entrez votre mot de passe',
                            'class'             => 'form-input'
                        ]
                    ],
                    'second_options' =>[
                        'label'     => 'Confirmation de mot de passe',
                        'attr'      => [
                            'placeholder'       => 'Confirmez le mot de passe',
                            'class'             => 'form-input'
                        ]
                    ]
                ])
                    ->add('submit', SubmitType::class, [
                        'label'     => "S'inscrire"

                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
