<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use AppBundle\Entity\GCMDesktopAnswer;

class GCMDesktopAnswerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('releasePlan', 'choice', array(
                'choices' => GCMDesktopAnswer::getReleasePlanChoices(),
                'expanded' => true,
                'multiple' => false,
            ))
            ->add('fileType', 'choice', array(
                'choices' => GCMDesktopAnswer::getFileTypeChoices(),
                'expanded' => true,
                'multiple' => false,
            ))
            ->add('envType', 'choice', array(
                'choices' => GCMDesktopAnswer::getEnvTypeChoices(),
                'expanded' => true,
                'multiple' => false,
            ))
            ->add('envTypeTransition', 'text', array(
                'required' => false,
            ))
            ->add('flashSupport', 'choice', array(
                'choices' => GCMDesktopAnswer::getFlashSupportChoices(),
                'expanded' => true,
                'multiple' => false,
            ))
            ->add('flashSupportTransition', 'text', array(
                'required' => false,
            ))
            ->add('htmlTitlesAvailable', 'text')
            ->add('htmlTitlesPlanned', 'text')
            ->add('htmlTitlesTransition', 'text', array(
                'required' => false,
            ))
            ->add('notes', 'textarea', array(
                'required' => false,
            ))
            ->add('name', 'text')
            ->add('lastname', 'text')
            ->add('company', 'text')
            ->add('position', 'text')
            ->add('email', 'email')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GCMDesktopAnswer',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gcmdesktop_answer';
    }
}
