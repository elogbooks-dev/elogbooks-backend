<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;

class AbstractApiType extends AbstractType
{
    public function getBlockPrefix()
    {
        return '';
    }
}