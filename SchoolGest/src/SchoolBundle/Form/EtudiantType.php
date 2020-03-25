<?php

namespace SchoolBundle\Form;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use SchoolBundle\SchoolBundle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use UserBundle\Entity\Utilisateur;
use UserBundle\UserBundle;

class EtudiantType extends AbstractType
{



    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {



            $builder->add('cinP', EntityType::class, array(
                'class' => 'UserBundle\Entity\Utilisateur',
                'choice_label'=>function(Utilisateur $u){
                    if ($u->getRoles()===[0 => "ROLE_PARENT",1 => "ROLE_USER"]){
                        return $u->getCin();
                    }
                },

            ));

              $builder->add('idClasse', EntityType::class, array('class' => 'SchoolBundle:Classe', 'choice_label' => 'nomClasse', 'multiple' => false));

               $builder ->add('ide', EntityType::class, array(
                   'class' => 'UserBundle\Entity\Utilisateur',
                   'choice_label'=>function(Utilisateur $u){
                       if ($u->getRoles()===[0 => "ROLE_ETUDIANT",1 => "ROLE_USER"]){
                           return $u->getNom();
                       }
                   },

               ));

    }

     /**
     * {@inheritdoc}
     */

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SchoolBundle\Entity\Etudiant',
            'text_data' => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'schoolbundle_etudiant';
    }


}
