<?php

namespace BibliothequeBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpruntType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateemprunt', DateType::class, [
            'widget' => 'single_text',
            // this is actually the default format for single_text
            'format' => 'm-d-Y',
        ])->add('datedebut', DateType::class)->add('datefin', DateType::class)->add('idemprunteur', EntityType::class,array(
            'class'=>'UserBundle:Utilisateur',
            'choice_label'=>'id',
            'multiple'=>false
        ))->add('idlivre', EntityType::class,array(
            'class'=>'BibliothequeBundle:Livre',
            'choice_label'=>'id',
            'multiple'=>false
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BibliothequeBundle\Entity\Emprunt'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bibliothequebundle_emprunt';
    }


}
