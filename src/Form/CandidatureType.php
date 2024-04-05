<?php

namespace App\Form;

use App\Entity\Candidature;
use App\Entity\Utilisateur;
use App\Entity\Annonce;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('approuver')
        ->add('dateApprobation')
        ->add('Utilisateur', EntityType::class, [
            'class' => Utilisateur::class,
            'choice_label' => function($utilisateur) {
                return $utilisateur->getNom() . ' ' . $utilisateur->getPrenom();
            },
        ])
        ->add('Annonce', EntityType::class, [
            'class' => Annonce::class,
            'choice_label' => function($annonce) {
                return $annonce->getDescriptionAnnonce();
            },
        ])  
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidature::class,
        ]);
    }
}
