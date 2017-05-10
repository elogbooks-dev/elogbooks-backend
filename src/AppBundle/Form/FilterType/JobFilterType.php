<?php

namespace AppBundle\Form\FilterType;

use AppBundle\Form\FilterType\Model\JobFilter;
use AppBundle\Form\Type\AbstractApiType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobFilterType extends AbstractApiType
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
            ->add('status',null,[])
            ->add('type',null,[])
            ->add('description',null,[])
            ->add('customer',null,[])
            ->add('priority',null,[])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => jobFilter::class,
            'csrf_protection' => false,
        ));
    }
}
