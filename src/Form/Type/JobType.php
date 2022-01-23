<?php

declare(strict_types=1);

namespace App\Form\Type;

use App\Entity\Job;
use App\Entity\Property;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotNull;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('summary', TextType::class)
            ->add('description', TextType::class)
            ->add('property', EntityType::class, [
                'class' => Property::class
            ])
            ->add('status', TextType::class)
            ->add('user', EntityType::class, [
                'class' => User::class
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Job::class
        ]);
    }
}
