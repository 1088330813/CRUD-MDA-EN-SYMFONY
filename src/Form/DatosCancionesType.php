<?php

namespace App\Form;

use App\Entity\Canciones;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DatosCancionesType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            ->add('nombreCancion')
            ->add('letra')
            ->add('tematica')
            ->add('tonalidad')
            ->add('tempo',IntegerType::class)
            ->add('genero')
            ->add('enviar',SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Canciones::class,
        ]);
    }
}
