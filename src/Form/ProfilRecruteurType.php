<?php

namespace App\Form;

use App\Entity\ProfilRecruteur;
use App\Entity\utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilRecruteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomEntreprise')
            ->add('adresseEntreprise')
            ->add('utilisateur', EntityType::class, [
                'class' => utilisateur::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProfilRecruteur::class,
        ]);
    }
}
