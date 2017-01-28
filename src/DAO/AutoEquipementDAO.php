<?php

namespace Flexauto\DAO;


class AutoEquipementDAO extends DAO
{
    public function insertAutoEquipements($autoId, $idOfAllEquipements)
    {
        foreach ($idOfAllEquipements as $idEquipement) {
            $associativeArray = $this->getAutoEquipementObjetAsAssociativeArray($autoId, $idEquipement);
            $this->getDb()->insert('t_auto_equipement', $associativeArray );
        }
    }

    public function getIdEquipementsByIdAuto($idAuto)
    {
        $query = 'SELECT * FROM t_auto_equipement WHERE auto_fk = ?';
        $associativeArray = $this->getDb()->fetchAll($query, array($idAuto));

        $arrayOfIdEquipements = array();
        foreach ($associativeArray as $row)
        {
            $arrayOfIdEquipements[] = $row['equipement_fk'];
        }

        return $arrayOfIdEquipements;
    }

    /**
     * Builds a domain object from a DB row.
     * Must be overridden by child classes.
     */
    protected function buildDomainObject($row)
    {
        // TODO: Implement buildDomainObject() method.
    }

    private function getAutoEquipementObjetAsAssociativeArray($autoId, $idEquipement)
    {
        return array(
            'auto_fk' => $autoId,
            'equipement_fk' => $idEquipement
        );
    }
}