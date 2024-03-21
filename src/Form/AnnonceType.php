<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descriptionAnnonce', TextareaType::class, [
                'attr' => [
                    'class' => 'tinymce',
                    'maxlength' => '255',
                    'style' => 'width: 100%;'
                ],
                'required' => false, // Optionnel : Si le champ n'est pas obligatoire
            ])
            ->add('lieuTravail')
            ->add('dateAnnonce')
            ->add('status')
            ->add('Utilisateur', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => function($utilisateur) {
                    return $utilisateur->getNom() . ' ' . $utilisateur->getPrenom();
                },
            ])            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
