<?php

namespace App\Form;

use App\Entity\Scenario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScenarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' =>[
                'class' => 'form-control',
                'name' => 'formTitle'
                ]
            ])
            ->add('history', TextareaType::class, [
                'attr' =>[
                'class' => 'form-control',
                'name' => 'formTitle'
                ]
             ])
            ->add('imageFile', FileType::class, [
                'required' => false
            ])
            ->add('time', NumberType::class, [
                'attr' =>[
                'class' => 'form-control',
                'name' => 'formTitle'
                ]
            ])
            // ->add('createAt')
            ->add('survivors', RangeType::class, [
                'attr' => [
                    'min' => 1,
                    'max' => 6,
                    'step' => 1,
                    'class' => 'form-control'
                ]
            ])
            ->add('difficulty', null, [
                'multiple' => false,
                'attr' => [
                    'class' => 'form-control',
                    'name' => 'formTitle'
                    ]
            ])
            ->add('author', null, [
                'multiple' => false,
                'attr' => [
                    'class' => 'form-control',
                    'name' => 'formTitle',
                    ]
            ])
            ->add('version', null, [
                'multiple' => false,
                'attr' => [
                    'class' => 'form-control',
                    'name' => 'formTitle'
                    ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scenario::class,
        ]);
    }
}
