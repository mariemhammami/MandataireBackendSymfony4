<?php

namespace App\Form;

use App\Entity\MandatairesTest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MandatairesTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('identity')
            ->add('zipcode')
            ->add('dep')
            ->add('siren')
            ->add('nic')
            ->add('adresse')
            ->add('annonces')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MandatairesTest::class,
        ]);
    }
}
