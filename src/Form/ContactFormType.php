<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,[
                'label'     =>      'Votre nom',
                'required'  =>      true,
                'attr'      =>      [
                    'placeholder'   =>  'Ex : Jean',
                    'value'     =>      ''
                ]
            ])
            ->add('prenom', TextType::class,[
                'label'     =>      'Votre prenom',
                'required'  =>      true,
                'attr'      =>      [
                    'placeholder'   =>  'Ex : Dupond ',
                    'value'     =>      ''
                ]
            ])
            ->add('message', TextareaType::class,[
                'label'     =>      'Quel est votre message',
                'required'  =>      true,
                'attr'      =>      [
                    'placeholder'   =>  'Ex : Jean',
                    'value'     =>      ''
                ]
            ])
            ->add('email', EmailType::class,[
                'label'     =>      'Quel est votre message',
                'required'  =>      true,
                'attr'      =>      [
                    'placeholder'   =>  'Ex : Jean.Dupond@gmail.com',
                    'value'     =>      ''
                ]
            ])
            ->add('submit', SubmitType::class,[
                'label'     =>      'Envoyer',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
