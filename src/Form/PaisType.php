<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pais', TextType::class, ['label'=>'Nombre del País: ', 'attr'=>['class'=>'form-control']])
            ->add('capital', TextType::class, ['label'=>'Nombre de la Capital: ', 'attr'=>['class'=>'form-control']])
            ->add('continente', ChoiceType::class, ['label'=>'Continente al que pertenece: ', 'attr'=>['class'=>'form-control'], 'choices'=>[
                'América'=>'América',
                'Europa'=>'Europa',
                'Asia'=>'Asia',
                'África'=>'África',
                'Oceanía'=>'Oceanía',
                'Antártida'=>'Antártida'
            ]])
            ->add('idioma', TextType::class, ['label'=>'Idioma principal: ', 'attr'=>['class'=>'form-control']])
            ->add('descripcion', TextareaType::class, ['label'=>'Descripción: ', 'attr'=>['class'=>'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
