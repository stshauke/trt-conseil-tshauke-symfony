<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', TextType::class, [
            'label' => 'Email'
        ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Mot de passe',
                                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('nom')
            ->add('prenom')
            ->add('dateCreation')
            ->add('status')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Consultant' => 'ROLE_CONSULTANT',
                    // Ajoutez d'autres rôles si nécessaire
                ],
                'multiple' =>true, // Permettre à l'utilisateur de sélectionner plusieurs rôles
                'expanded' =>true, // Afficher les choix comme des cases à cocher
                'data' => ['ROLE_CONSULTANT'], //Définir la valeur par défaut
            ])
            ->add('agree_terms', CheckboxType::class, [
                'mapped' => false, // Cela indique que ce champ ne sera pas mappé à une propriété de l'objet de formulaire
               'label'=>'Accepter nos conditions',
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
