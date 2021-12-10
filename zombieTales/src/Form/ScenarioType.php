<?php

namespace App\Form;

use App\Entity\Scenario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScenarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('history')
            ->add('map')
            ->add('time')
            ->add('createAt')
            ->add('updatedAt')
            ->add('survivors')
            ->add('difficulty')
            ->add('author')
            ->add('version')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Scenario::class,
        ]);
    }
}
