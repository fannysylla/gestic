<?php

namespace App\Form;

use App\Entity\Referentiel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AjoutReferentielType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomref',TextType::class,[
                'label' => 'nom complet',
                'required' => false
                ])
            ->add('creer', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary'],
                            
                ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Referentiel::class,
        ]);
    }
}
