<?php

namespace App\Form;

// ...

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('picture', FileType::class, ['required' => false])
            ->add('title', TextType::class, ['required' => false])
            ->add('content', TextareaType::class, ['required' => false])
            ->add('isPublished', CheckboxType::class, ['required' => false])
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'label',
                'multiple' => true,
                'expanded' => false,
                'required' => false
            ])
        ;
    }

    // ...
}