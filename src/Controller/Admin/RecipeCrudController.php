<?php

namespace App\Controller\Admin;

use App\Entity\Recipe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RecipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recipe::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['id' => 'DESC', 'titre' => 'ASC'])
            ->setPaginatorPageSize(25)
            ->setPaginatorRangeSize(5);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre', 'titre'),
            ChoiceField::new('difficulte', 'Difficulté')->setChoices([
                'facile' => '1',
                'moyen' => '2',
                'difficile' => '3',
                'très difficile' => '4'
                ])
                ->setRequired(true),
            ChoiceField::new('duree', 'Temps de préparation')
                ->setChoices([
                '10 mn' => '10',
                '20 mn' => '20',
                '30 mn' => '30',
                '40 mn' => '40',
                '50 mn' => '50',
                '60 mn' => '60',
                '70 mn' => '70',
                '80 mn' => '80',
                '90 mn' => '90',
                '100 mn' => '100',
                '110 mn' => '110',
                '120 mn' => '120',
                ])
                ->setRequired(true),
            ChoiceField::new('cout', 'Cout de la recette')
                ->setChoices([
                '-5€ par personne' => '1',
                '5€ à 10€ par personne' => '2',
                '10€ à 20€ par personne' => '3',
                '+20€ par personne' => '4',
                ])
                ->setRequired(true),
            TextField::new('ingredients', 'Ingrédients de la recette')->hideOnIndex(),
            TextField::new('description', 'Description de la recette')->hideOnIndex(),
            TextField::new('etapes', 'Etapes de la recette')->hideOnIndex(),
            DateField::new('date', 'Date de Mise à jour'),
            ChoiceField::new('personnes', 'Combien de personnes')->setChoices([
                'Recette pour 1 personne' => '1',
                'Recette pour 2 personnes' => '2',
                'Recette pour 3 personnes' => '3',
                'Recette pour 4 personnes' => '4',
                'Recette pour 5 personnes' => '5',
                'Recette pour 6 personnes' => '6',
                'Recette pour 7 personnes' => '7',
                'Recette pour 8 personnes' => '8',
                'Recette pour 9 personnes' => '9',
                'Recette pour 10 personnes' => '10',
                'Recette pour 11 personnes' => '11',
                'Recette pour 12 personnes' => '12',
            ])->hideOnIndex(),
            ChoiceField::new('visible', 'Visible sur le site')
                ->setChoices([
                'Non' => '0',
                'Oui' => '1',
                ])
                ->setRequired(true),

            IntegerField::new('likeRecipe', 'Nombre de likes'),
            // Modifier le cuisinier pour obtenir le nom et le prenom
            IntegerField::new('cook', 'Le cuisinier'),
            ImageField::new('photo', 'image')
                ->setBasePath('uploads/img/recipe/')
                ->setUploadDir('public/uploads/img/recipe')
                ->setRequired(false)
        ];
    }

}
