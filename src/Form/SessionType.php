<?php

namespace App\Form;

use App\Entity\Session;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomsess')
            ->add('effectif')
            ->add('annee')
            ->add('datedebut',DateType::class ,['widget'=>'single_text'])
            ->add('datefin' ,DateType::class ,['widget'=>'single_text'])
            ->add('creer', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary'],
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
