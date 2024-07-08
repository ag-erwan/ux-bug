<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfonycasts\DynamicForms\DependentField;
use Symfonycasts\DynamicForms\DynamicFormBuilder;

class DependentFieldType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder = new DynamicFormBuilder($builder);
        $builder
            ->add('champ1', ChoiceType::class, [
                'choices' => [
                    'Pommes' => 'Pommier',
                    'Bananes' => 'Bananier',
                    'Fraises' => 'Fraisier',
                    'Autres' => ['Selectionner' => 'test']
                ],
                'attr' => [
                    'data-action' => 'live#action',
                    'data-live-action-param' => 'changeValues'
                ],
                'autocomplete' => true
            ])
            ->addDependent('champ2', 'champ1', function(DependentField $field, ?string $champ1) {
                if ($champ1 === null) {
                    return;
                }
                $field->add(TextType::class, []);
            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
