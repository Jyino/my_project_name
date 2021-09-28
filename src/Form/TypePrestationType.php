<?php

namespace App\Form;

use App\Entity\TypePrestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypePrestationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('Prestation')
            ->add('relation')
            ->add('nom2')
            ->add('leTypeBorne', EntityType::class, array(
                'class'        => TypeBorne::class,
                'choice_label' => 'nom',
                'multiple' => false
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TypePrestation::class,
        ]);
    }
}
