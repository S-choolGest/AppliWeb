<?php

namespace SchoolBundle\Form;

use SchoolBundle\Entity\Affectation;
use SchoolBundle\Repository\AffectationRepository;
use SchoolBundle\Repository\ClasseRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use UserBundle\Entity\Utilisateur;

class AbsenceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $idUti=$options['id'];
        dump($idUti);
        $builder->add('matiere',EntityType::class,array('class' => 'SchoolBundle:Matiere','choice_label'=>'nomMatiere','multiple'=>false))
            ->add('etat' ,HiddenType::class,  [
                'data' => 'non Justifié',
            ])
            ->add('date')->add('heure')
            ->add('idEtudiant',EntityType::class,array('class' => 'SchoolBundle:Etudiant','choice_label'=>'id','multiple'=>false))
       ->add('classe',EntityType::class, array(
           'class'=>'SchoolBundle:Affectation',
            'choice_label' =>'nom',
            'choice_value' =>'idClasse',
           "query_builder" => function(AffectationRepository $r) use ($idUti) {
               return $r->getNomClasseByUser($idUti);

           }

       ));
    }
     /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SchoolBundle\Entity\Absence',

        ));
        dump( $resolver->setRequired(['id']));
        $resolver->setRequired(['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'schoolbundle_absence';
    }


}
