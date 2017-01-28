<?php
namespace Flexauto\Form\Type;
/**
 * Created by Lapi Emo: lapigerard@yahoo.fr .
 * Date: 20-12-16
 * Time: 08:12
 */
use Silex\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
class AutoType extends AbstractType
{
    private $equipements;

    /**
     * @return mixed
     */
    public function getEquipements()
    {
        return $this->equipements;
    }

    /**
     * @param mixed $equipements
     */
    public function setEquipements($equipements)
    {
        $this->equipements = $equipements;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('marque', TextType::class, array('label'=>'Marque'))
            ->add('modele', TextType::class, array('label'=>'Modèle'))
            ->add('version', TextType::class, array('label'=>'Version'))
            ->add('couleurExt', TextType::class, array('label'=>'Couleur extérieure'))
            ->add('description', TextareaType::class, array('label'=>'Description du véhicule', 'required' => false))

            ->add('prix', NumberType::class, array('label'=>'Prix'))
            ->add('annee', ChoiceType::class, array('label'=>'Année', 'choices' => $this->getArray('annee')))
            ->add('nbPortes', ChoiceType::class, array('label'=>'Nombre de portes',
                'choices' => $this->getArray('portes')))
            ->add('nbSieges', ChoiceType::class, array('label'=>'Nombre de sièges',
                'choices' => $this->getArray('sieges')))
            ->add('puissance', NumberType::class, array('label'=>'Puissance'))
            ->add('kilometrage', NumberType::class, array('label'=>'Kilométrage'))
            ->add('airbag', ChoiceType::class, array(
                'label'=>'Airbags',
                'choices' => $this->getArray('airbag')
            ))
            ->add('climatisation', ChoiceType::class, array(
                'label'=>'Climatisation',
                'choices' => $this->getArray('climatisation')
            ))
            ->add('equipInt', ChoiceType::class, array(
                'label'=>'Equipement intérieur',
                'choices' => $this->getArray('equipInt')
            ))
            ->add('equipements', ChoiceType::class, array(
                'label'=>'Equipement',
                'expanded'=>true,
                'multiple'=>true,
                'choices' => $this->getArray('equipSup')
            ))
            ->add('carburant', ChoiceType::class, array(
                'label'=>'Carburant',
                'choices' => $this->getArray('carburant')
            ))
            ->add('transmission', ChoiceType::class, array(
                'label'=>'Transmission',
                'choices' => $this->getArray('transmission')
            ))

            ->add('photo1', FileType::class)
            ->add('photo2', FileType::class)
            ->add('photo3', FileType::class);
    }

    private function getArray($service)
    {
        switch ($service) {
            case 'equipInt': return array('Alcantara'=>'Alcantara', 'Tissu'=>'Tissu', 'Cuir partiel'=>'Cuir partiel',
                'Velour'=>'Velour','Cuir'=>'Cuir');
            break;

            case 'airbag': return array('Airbag conducteur' => 'Airbag conducteur',
                'Airbag frontaux'=>'Airbag frontaux', 'Airbag frontaux et lateraux'=>'Airbag frontaux et lateraux');
            break;

            case 'climatisation': return array('Climatisation'=>'Climatisation',
                'Climatisation automatique'=>'Climatisation automatique');
            break;

            case 'carburant': return array('Essence'=>'Essence', 'Diesel'=>'Diesel', 'Electrique'=>'Electrique',
                'Hybride'=>'Hybride');
            break;

            case 'transmission': return array('Boite manuelle'=>'Boite manuelle',
                'Boite automatique'=>'Boite automatique', 'Semi-automatique'=>'Semi-automatique' );
            break;

            case 'equipSup': return $this->getEquipements();
            break;

            case 'portes': return array(2=>'2/3', 4=>'4/5', 6=>'6/7');
            break;

            case 'sieges': return array(2=>'2', 3=>'3', 4=>'4', 5=>'5', 6=>'6', 7=>'7');
            break;

            case 'annee':
                $arrayAnnee = array();
                for ($i = 1996; $i <= date("Y"); $i++ ) {
                    $arrayAnnee[$i] = $i;
                }
                return $arrayAnnee;
                break;
        }
    }

    public function getName() {
        return 'auto';
    }
}