<?php

namespace App\Form;

use App\Entity\ProfilRecruteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurRecruteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('utilisateur', UtilisateurType::class)
        ->add('profilRecruteur', ProfilRecruteurType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilRecruteur::class,
        ]);
    }
}
