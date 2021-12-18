<?php

namespace App\Form;

use App\Entity\Annonces;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class AnnoncesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('slug', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('content', TextareaType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('pays_imarticul', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('nom', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('num_imarticul', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('images', CollectionType::class, [
                'entry_type' => FileType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'mapped' => false,
                'required' => false,
                'allow_delete' => true,
                'label' => false
                ])
            ->add('nom_societe', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('num_contrat', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('nom_agence', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('addresse_agence', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('email_agence', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('nom_conduct', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('prenom_conduct', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('addres_conduct', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('tel_email', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('num_permis', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('nom_temoins', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('adres_temoin', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('mes_observ', TextType::class,[
                'label' => false,
                'required' => true
            ])
            ->add('circontance_1', CheckboxType::class, [
                'label' => false,
                'required' => false,
                'value' => 'pall',
            ])
            ->add('circontance_2', CheckboxType::class, [
                'label' => false,
                'required' => false,
                'value' => 'pall',
            ])
            ->add('circontance_3', CheckboxType::class, [
                'label' => false,
                'required' => false,
                'value' => 'fall',
            ])
            ->add('circontance_4', CheckboxType::class, [
                    'label' => false,
                    'required' => false,
                    'value' => 'tall',
            ])
            ->add('circontance_5', CheckboxType::class, [
                'label' => false,
                'required' => false,
                'value' => 'ball',
            ])
            ->add('circontance_6', CheckboxType::class, [
                    'label' => false,
                    'required' => false,
                    'value' => 'vall',
            ])
            ->add('circontance_7', CheckboxType::class, [
                        'label' => false,
                        'required' => false,
                        'value' => 'sall',
            ])
            ->add('circontance_8', CheckboxType::class, [
                    'label' => false,
                    'required' => false,
                    'value' => 'jall',
            ])
            ->add('circontance_9', CheckboxType::class, [
                        'label' => false,
                        'required' => false,
                        'value' => 'wall',
            ])
            ->add('circontance_10', CheckboxType::class, [
                'label' => false,
                'required' => false,
                'value' => 'pall',
            ])
            ->add('circontance_11', CheckboxType::class, [
                'label' => false,
                'required' => false,
                'value' => 'rall',
            ])    
            ->add('circontance_14',ChoiceType::class,array(
                'choices' => [
                    'fall' => 'fall',
                    'tafa' => 'tafa',
                ],
                'expanded' => true,
                'label' => false,
                
            ))  
            ->add('circontance_15',ChoiceType::class,array(
                'choices' => [
                    'fall' => 'fall',
                    'tafa' => 'tafa',
                ],
                'expanded' => true,
                'label' => false,
                
            ))
            ->add('circontance_16',ChoiceType::class,array(
                'choices' => [
                    'fall' => 'fall',
                    'tafa' => 'tafa',
                ],
                'expanded' => true,
                'label' => false,
                
            ))
            ->add('circontance_17',ChoiceType::class,array(
                'choices' => [
                    'fall' => 'fall',
                    'tafa' => 'tafa',
                ],
                'expanded' => true,
                'label' => false,
                
            )) 
            ->add('circontance_18',ChoiceType::class,array(
                'choices' => [
                    'fall' => 'fall',
                    'tafa' => 'tafa',
                ],
                'expanded' => true,
                'label' => false,
                
            ))                  
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonces::class,
        ]);
    }
    public function getName()
    {
        return "images";
    }
}
