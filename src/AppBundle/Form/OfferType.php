<?php

namespace AppBundle\Form;

use AppBundle\Entity\Offer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title', TextType::class)
        ->add('description', TextareaType::class, array(
            'attr' => array(
                'rows' => 6
            )
        ))
        ->add('zipcode', TextType::class)
        ->add('offerImg', FileType::class, array('label' => 'Image'))
        ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Offer::class,
        ));
    }
}
$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event){
    $offer = $event->getData();
    $form = $event->getForm();
    if (!$offer || null === $offer->getId()) {
        $form->add('offerImg', FileType::class, array('label' => 'Image'));
        $form->add('save', SubmitType::class, array(
            'validation_groups' => array('Default' , 'add'),
        ));
    }else {
        $form->add('offerImg', FileType::class, array('label' => 'New image', 'required' ==> false));
        $form->add('save', SubmitType::class, array(
            'validation_groups' => array('Default'),
        ));
    }
})