<?php

namespace App\Form;

use App\Entity\Module;
use PhpParser\Node\Expr\Cast\String_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,['attr'=>['class'=>'form-control'],'label'=>'Name'])
            ->add('type',ChoiceType::class,['choices' => [
                'température' => 'température',
                'vitesse' => 'vitesse',
            ],'attr'=>['class'=>'form-control'],'label'=>'Type'])
            ->add('status',ChoiceType::class,['choices' => [
                'Marche' => 'marche',
                'Panne' => 'panne',
            ],'attr'=>['class'=>'form-control'],'label'=>'Etat'])
            ->add('lastMesuredValue',TextType::class,['attr'=>['class'=>'form-control'],'label'=>'last Mesured Value'])
            ->add('NumberDataSent',TextType::class,['attr'=>['class'=>'form-control'],'label'=>'Number Data Sent'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Module::class,
        ]);
    }
}
