<?php

namespace AppBundle\Form;

use AppBundle\Entity\Local;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('planta', TextType::class, [
                'label' => 'Planta'
            ])
            ->add('nombre', TextType::class,[
                'label'=> 'Nombre'
            ])
            ->add('resusuario', null,[
                'label'=> 'Usuario'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Local::class
        ]);
    }

}
