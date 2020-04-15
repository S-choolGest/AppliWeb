<?php

namespace BibliothequeBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class LivreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')->add('auteur')->add('editeur')->add('categorie')->add('datesortie')->add('taille')->add('quantite')->add('imageFile', VichImageType::class)->add('dateajout')->add('idBibliotheque', EntityType::class,array(
            'class'=>'BibliothequeBundle:Bibliotheque',
            'choice_label'=>'nom',
            'multiple'=>false
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BibliothequeBundle\Entity\Livre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bibliothequebundle_livre';
    }


}
