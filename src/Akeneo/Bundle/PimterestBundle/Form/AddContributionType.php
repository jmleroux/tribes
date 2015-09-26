<?php

namespace Akeneo\Bundle\PimterestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddContributionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mediaUrl')
            ->add('content')
            ->add('latitude', 'number', ['scale' => 10])
            ->add('longitude', 'number', ['scale' => 10]);

        $builder->add('userType', 'choice', [
            'choices'  => [
                'partner'   => 'Partner',
                'customer'  => 'Customer',
                'community' => 'Collaborator'
            ],
            'required' => true,
        ]);

        $builder->add('content', 'textarea');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Akeneo\Bundle\PimterestBundle\Document\Contribution'
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pimterest_add_contribution';
    }
}
