<?php

namespace AppBundle\Form;

use AppBundle\Entity\Material;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marca')
            ->add('modelo')
            ->add('numserie')
            ->add('unidades')
            ->add('provedor')
            ->add('ubicacion')
            ->add('fechaAlta')
            ->add('fechaBaja')
            ->add('locales')
            ->add('proveedores')
            ->add('estados');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Material::class
        ]);
    }
}
