<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdType extends AbstractType
{
    /**
     * Permet d'avoir la configuration de base d'un champ
     *
     * @param string $label
     * @param string $placeholder
     * @param array $options
     * @return array
     */
    private function getConfiguration($label, $placeholder, $options = []) {
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ], $options);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                TextType::class,
                $this->getConfiguration("Titre", "Saisisez le titre"))

            ->add(
                'slug',
                TextType::class,
                $this->getConfiguration("Taper l'adresse web", "Adresse web (automatique)", [
                'required' => false
            ]))

            ->add(
                'coverImage',
                UrlType::class,
                $this->getConfiguration("URL de l'image principal", "Saisisez l'url de l'image principale"))

            ->add(
                'introduction',
                TextType::class,
                $this->getConfiguration("Introduction", "Donnez une déscription global de l'annonce"))

            ->add(
                'content',
                TextareaType::class,
                $this->getConfiguration("Description détaillé", "Tapez une description qui donne envie"))

            ->add(
                'price',
                MoneyType::class,
                $this->getConfiguration("Prix", "Saisisez le prix d'une nuit"))

            ->add(
                'rooms',
                IntegerType::class,
                $this->getConfiguration("Nombre de chambre", "Saisisez le nombre de chambre disponibles"))

            ->add(
                'images',
                CollectionType::class,[
                'entry_type' => ImageType::class,
                'allow_add' => true,
                'allow_delete' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
