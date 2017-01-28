<?php
/**
 * Created by Lapi Emo
 * Date: 19-12-16
 * Time: 15:27
 */
namespace Flexauto\Domain;
class Auto
{
    private  $idAuto;

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
    private $equipementInt;

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
     * @return mixed
     */
    public function getIdAuto()
    {
        return $this->idAuto;
    }

    /**
     * @param mixed $idAuto
     */
    public function setIdAuto($idAuto)
    {
        $this->idAuto = $idAuto;
    }

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
    public function getEquipementInt()
    {
        return $this->equipementInt;
    }

    /**
     * @param mixed $equipementInt
     */
    public function setEquipementInt($equipementInt)
    {
        $this->equipementInt = $equipementInt;
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
}