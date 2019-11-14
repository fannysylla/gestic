<?php

namespace App\Form;

use App\Form\UserType;
use App\Entity\Apprenant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class ApprenantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('telephone')
            ->add('email')
            ->add('sex')
            ->add('statut')
            ->add('adresse')
            ->add('Referentiel')
            ->add('user', UserType::class)
            ->add('session')
            ->add('datenaiss', DateType::class,['widget'=>'single_text'])

            ->add('creer', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary'],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Apprenant::class,
        ]);
    }
}
