<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nombre'])
            ->add('lastName', TextType::class, ['label' => 'Apellido'])
            ->add('age', RangeType::class, ['label' => 'Edad'])
            ->add('team', ChoiceType::class, ['label' => 'Equipo', 'choices' => [
                'Valencia' => 'VCF',
                'Barcelona' => 'FCB',
                'Albacete' => 'FCA'
            ]])
            ->add('goals', TextType::class, ['label' => 'Goles'])
            ->add('cards', TextType::class, ['label' => 'Tarjetas'])
            ->add('birthDate', null, ['label' => 'Cumpleaños', 'widget' => 'single_text']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
