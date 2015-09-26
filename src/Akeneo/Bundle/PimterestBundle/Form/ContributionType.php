<?php

namespace Akeneo\Bundle\PimterestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContributionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('appId')
            ->add('username')
            ->add('mediaUrl')
            ->add('active')
            ->add('content')
            ->add('latitude', 'number')
            ->add('longitude', 'number');

        $builder->add('source', 'choice', [
            'choices'  => [
                'twitter'   => 'Twitter',
                'instagram' => 'Instagram',
                'community' => 'Community'
            ],
            'required' => true,
        ]);

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
            'data_class' => 'PimterestBundle\Entity\Contribution'
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_contribution';
    }
}
