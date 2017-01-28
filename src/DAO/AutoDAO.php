<?php
namespace Flexauto\DAO;

use flexauto\Domain\Auto;

/**
 * Created by Lapi Emo
 * Date: 20-12-16
 * Time: 07:33
 */
class AutoDAO extends DAO
{
    public function insert(Auto $auto)
    {
        $associativeArray = $this->convertAutoObjectInAssociativeArray($auto);
        $this->getDb()->insert('t_auto', $associativeArray);

        return $this->getDb()->lastInsertId();
    }

    /**
     * Delete a given auto in the DB according to the $id.
     * @param $id
     */
    public function delete($id)
    {

    }

    /**
     * Return all autos present in the DB.
     */
    public function getAllAutos()
    {
        $query = 'SELECT * FROM t_auto ORDER BY date_ajout DESC ';
        $autosObjectsAsAssociativeArray = $this->getDb()->fetchAll($query);

        $autos = array();
        foreach ($autosObjectsAsAssociativeArray as $auto)
        {
            $autoId = $auto['id_auto'];
            $autos[$autoId] = $this->buildDomainObject($auto);
        }

        return $autos;
    }

    public function getAutos()
    {
        $query = 'SELECT * FROM t_auto ORDER BY date_ajout DESC';
        $autosObjectsAsAssociativeArray = $this->getDb()->fetchAll($query);

        $autos = array();
        foreach ($autosObjectsAsAssociativeArray as $auto)
        {
            $autoId = $auto['id_auto'];
            $autos[$autoId] = $this->buildDomainObject($auto);
        }

        return $autos;
    }

    public function getAutoById($id)
    {
        $query = 'SELECT * FROM t_auto WHERE id_auto = ?';
        $autoAsAssociativeArray = $this->getDb()->fetchAssoc($query, array($id));

        return $this->buildDomainObject($autoAsAssociativeArray);
    }

    /**
     * Return a given auto according to the marque.
     * @param $marque
     */
    public function get_auto_by_marque($marque)
    {

    }

    protected function buildDomainObject($row)
    {

        $auto = new Auto();

        $auto->setIdAuto($row['id_auto']);
        $auto->setMarque($row['marque']);
        $auto->setModele($row['modele']);
        $auto->setVersion($row['version']);
        $auto->setCarburant($row['carburant']);
        $auto->setTransmission($row['transmission']);
        $auto->setPuissance($row['puissance']);
        $auto->setPrix($row['prix']);
        $auto->setKilometrage($row['kilometrage']);
        $auto->setAnnee($row['annee']);
        $auto->setCouleurExt($row['couleur_ext']);
        $auto->setNbPortes($row['nb_portes']);
        $auto->setNbSieges($row['nb_sieges']);
        $auto->setEquipementInt($row['airbag']);
        $auto->setAirbag($row['equipement_int']);
        $auto->setClimatisation($row['climatisation']);
        $auto->setDescription($row['description']);

        return $auto;
    }

    private function convertAutoObjectInAssociativeArray(Auto $auto)
    {
        return array(
            'marque' => $auto->getMarque(),
            'modele' => $auto->getModele(),
            'version' => $auto->getVersion(),
            'carburant' => $auto->getCarburant(),
            'transmission' => $auto->getTransmission(),
            'puissance' => $auto->getPuissance(),
            'prix' => $auto->getPrix(),
            'kilometrage' => $auto->getKilometrage(),
            'annee' => $auto->getAnnee(),
            'couleur_ext' => $auto->getCouleurExt(),
            'nb_portes' => $auto->getNbPortes(),
            'nb_sieges' => $auto->getNbSieges(),
            'equipement_int' => $auto->getEquipementInt(),
            'airbag' => $auto->getAirbag(),
            'climatisation' => $auto->getClimatisation(),
            'description' => $auto->getDescription(),
            'date_ajout' => date("Y-m-d")
        );
    }
}