<?php
namespace Flexauto\Form\Manager;

use Flexauto\Domain\Auto;
use Flexauto\Domain\Image;

include_once __DIR__.'/../../Domain/Image.php';

/**
 * Created by Lapi Emo
 * Date: 20-12-16
 * Time: 20:10
 */
class AutoManager
{
    /**
     * @var string
     */
    private $marque;

    /**
     * @var string
     */
    private $modele;

    /**
     * @var string
     */
    private $version;

    /**
     * Valeurs possibles: Essence | Diesel | Hybride | Electrique
     */
    private $carburant;

    /**
     * Valeurs possibles: Boite manuelle | Boite automatique | Semi-automatique
     */
    private $transmission;

    /**
     * @var integer
     */
    private $puissance;

    /**
     * @var double
     */
    private $prix;

    /**
     * @var integer
     */
    private $kilometrage;

    /**
     * @var integer
     */
    private $annee;

    /**
     * @var string
     */
    private $couleurExt;

    /**
     * Valeurs possibles: Alcantra | Tissu | Cuir partiel | Velour | Cuir
     */
    private $equipInt;

    /**
     * @var integer
     */
    private $nbPortes;

    /**
     * @var integer
     */
    private $nbSieges;

    /**
     * Valeurs possibles: Airbag conducteur | Airbag frontaux | Airbag frontaux et latéraux.
     */
    private $airbag;

    /**
     * Valeurs possibles: Climatisation | Climatisation automatique
     */
    private $climatisation;

    /**
     * @var string
     */
    private $description;

    /**
     * @var array of Equipement.
     */
    private $equipements;

    private $photo1; private $photo2;

    private $photo3; private $photo4;

    private $photo5; private $photo6;

    /**
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param string $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return string
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param string $modele
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getCarburant()
    {
        return $this->carburant;
    }

    /**
     * @param mixed $carburant
     */
    public function setCarburant($carburant)
    {
        $this->carburant = $carburant;
    }

    /**
     * @return mixed
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * @param mixed $transmission
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;
    }

    /**
     * @return int
     */
    public function getPuissance()
    {
        return $this->puissance;
    }

    /**
     * @param int $puissance
     */
    public function setPuissance($puissance)
    {
        $this->puissance = $puissance;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return int
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * @param int $kilometrage
     */
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;
    }

    /**
     * @return int
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * @param int $annee
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }

    /**
     * @return string
     */
    public function getCouleurExt()
    {
        return $this->couleurExt;
    }

    /**
     * @param string $couleurExt
     */
    public function setCouleurExt($couleurExt)
    {
        $this->couleurExt = $couleurExt;
    }

    /**
     * @return mixed
     */
    public function getEquipInt()
    {
        return $this->equipInt;
    }

    /**
     * @param mixed $equipInt
     */
    public function setEquipInt($equipInt)
    {
        $this->equipInt = $equipInt;
    }

    /**
     * @return int
     */
    public function getNbPortes()
    {
        return $this->nbPortes;
    }

    /**
     * @param int $nbPortes
     */
    public function setNbPortes($nbPortes)
    {
        $this->nbPortes = $nbPortes;
    }

    /**
     * @return int
     */
    public function getNbSieges()
    {
        return $this->nbSieges;
    }

    /**
     * @param int $nbSieges
     */
    public function setNbSieges($nbSieges)
    {
        $this->nbSieges = $nbSieges;
    }

    /**
     * @return mixed
     */
    public function getAirbag()
    {
        return $this->airbag;
    }

    /**
     * @param mixed $airbag
     */
    public function setAirbag($airbag)
    {
        $this->airbag = $airbag;
    }

    /**
     * @return mixed
     */
    public function getClimatisation()
    {
        return $this->climatisation;
    }

    /**
     * @param mixed $climatisation
     */
    public function setClimatisation($climatisation)
    {
        $this->climatisation = $climatisation;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getEquipements()
    {
        return $this->equipements;
    }

    /**
     * @param array $equipements
     */
    public function setEquipements($equipements)
    {
        $this->equipements = $equipements;
    }

    /**
     * @return mixed
     */
    public function getPhoto1()
    {
        return $this->photo1;
    }

    /**
     * @param mixed $photo1
     */
    public function setPhoto1($photo1)
    {
        $this->photo1 = $photo1;
    }

    /**
     * @return mixed
     */
    public function getPhoto2()
    {
        return $this->photo2;
    }

    /**
     * @param mixed $photo2
     */
    public function setPhoto2($photo2)
    {
        $this->photo2 = $photo2;
    }

    /**
     * @return mixed
     */
    public function getPhoto3()
    {
        return $this->photo3;
    }

    /**
     * @param mixed $photo3
     */
    public function setPhoto3($photo3)
    {
        $this->photo3 = $photo3;
    }

    /**
     * @return mixed
     */
    public function getPhoto4()
    {
        return $this->photo4;
    }

    /**
     * @param mixed $photo4
     */
    public function setPhoto4($photo4)
    {
        $this->photo4 = $photo4;
    }

    /**
     * @return mixed
     */
    public function getPhoto5()
    {
        return $this->photo5;
    }

    /**
     * @param mixed $photo5
     */
    public function setPhoto5($photo5)
    {
        $this->photo5 = $photo5;
    }

    /**
     * @return mixed
     */
    public function getPhoto6()
    {
        return $this->photo6;
    }

    /**
     * @param mixed $photo6
     */
    public function setPhoto6($photo6)
    {
        $this->photo6 = $photo6;
    }

    public function createNewAuto()
    {
        $newAuto = new Auto();

        $newAuto->setMarque($this->getMarque());
        $newAuto->setModele($this->getModele());
        $newAuto->setVersion($this->getVersion());
        $newAuto->setCarburant($this->getCarburant());
        $newAuto->setTransmission($this->getTransmission());
        $newAuto->setPuissance($this->getPuissance());
        $newAuto->setPrix($this->getPrix());
        $newAuto->setKilometrage($this->getKilometrage());
        $newAuto->setAnnee($this->getAnnee());
        $newAuto->setCouleurExt($this->getCouleurExt());
        $newAuto->setNbPortes($this->getNbPortes());
        $newAuto->setNbSieges($this->getNbSieges());
        $newAuto->setEquipementInt($this->getEquipInt());
        $newAuto->setAirbag($this->getAirbag());
        $newAuto->setClimatisation($this->getClimatisation());
        $newAuto->setDescription($this->getDescription());

        return $newAuto;
    }

    public function getAutoImages()
    {
        $newImage1 = new Image();
        $newImage1->setPathname($this->getPhoto1());

        $newImage2 = new Image();
        $newImage2->setPathname($this->getPhoto2());

        $newImage3 = new Image();
        $newImage3->setPathname($this->getPhoto3());

        return array($newImage1, $newImage2, $newImage3);
    }
}