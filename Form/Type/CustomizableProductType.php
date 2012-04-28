<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\AssortmentBundle\Form\Type;

use Symfony\Component\Form\FormBuilder;

/**
 * Customizable product form type.
 *
 * @author Paweł Jędrzejewski <pjedrzejewski@diweb.pl>
 */
class CustomizableProductType extends ProductType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('masterVariant', 'sylius_assortment_variant', array('master' => true))
            ->add('options', 'sylius_assortment_option_choice', array(
                'required' => false,
                'multiple' => true,
                'label'    => 'sylius_assortment.label.product.options'
            ))
            ->add('properties', 'collection', array(
                'required'     => false,
                'type'         => 'sylius_assortment_product_property',
                'allow_add'    => true,
                'by_reference' => false
            ))
        ;
    }
}
