<?php

namespace SchoolBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use UserBundle\Entity\Utilisateur;

class AbsenceAdminType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('matiere',EntityType::class,array('class' => 'SchoolBundle:Matiere','choice_label'=>'nomMatiere','multiple'=>false))
            ->add('etat' , ChoiceType::class, array(
            'choices'  =>[
            'non Justifié'=>'non Justifié',
                ' Justifié'=>' Justifié',
            ]))
            ->add('date')->add('heure')
            ->add('idEtudiant',EntityType::class,array('class' => 'SchoolBundle:Etudiant','choice_label'=>'id','multiple'=>false));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SchoolBundle\Entity\Absence'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'schoolbundle_absence';
    }


}
