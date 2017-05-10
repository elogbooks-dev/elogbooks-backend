<?php

namespace AppBundle\Form\FilterType;

use AppBundle\Form\FilterType\Model\ListFilter;
use AppBundle\Form\Type\AbstractApiType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListFilterType extends AbstractApiType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('page', null, [])
            ->add('limit', null, [])
            ->add('keyword', null, [])
            ->add('orderKey', null, [])
            ->add('orderDirection', null, [])
            ->add('serialisationGroups', null, [])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ListFilter::class,
            'csrf_protection' => false,
        ));
    }
}