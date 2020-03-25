<?php

namespace SchoolBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use UserBundle\Entity\Utilisateur;

class AffectationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('idProf', EntityType::class, array(
            'class' => 'UserBundle\Entity\Utilisateur',
            'choice_label'=>function(Utilisateur $u){
                if ($u->getRoles()===[0 => "ROLE_PROFESSEUR",1 => "ROLE_USER"]){
                    return $u->getUsername();
                }
            },

        ));$builder->add('idClasse',EntityType::class,array('class'=>'SchoolBundle:Classe','choice_label'=>'nomClasse','multiple'=>false));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SchoolBundle\Entity\Affectation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'schoolbundle_affectation';
    }


}
