<?php
/**
 * Created by Lapi Emo.
 * Date: 22-12-16
 * Time: 11:05
 */

namespace Flexauto\DAO;

use Flexauto\Domain\Equipement;

require_once __DIR__.'/DAO.php';
require_once __DIR__.'/../Domain/Equipement.php';

class EquipementDAO extends DAO
{
    /**
     * Renvoie tous les enregistrements présents dans la BD.
     */
    public function find_all()
    {
        $sql = 'SELECT * FROM t_equipement';

        $resultat = $this->getDb()->fetchAll($sql);

        foreach ($resultat as $row) {
            $id = $row['id_equipement'];
            $array_equip[$id] = $this->buildDomainObject($row);
        }

        return $array_equip;
    }

    public function getEquipementsById($arrayOfIdEquipements)
    {
        $query = "SELECT * FROM t_equipement WHERE id_equipement = ?";

        $arrayOfEquipements = array();
        foreach ($arrayOfIdEquipements as $id)
        {
            $id = intval($id);
            $associativeArray = $this->getDb()->fetchAssoc($query, array($id));
            $arrayOfEquipements[$id] = $this->buildDomainObject($associativeArray);
        }

        return $arrayOfEquipements;
    }

    /**
     * Builds a domain object from a DB row.
     * Must be overridden by child classes.
     */
    protected function buildDomainObject($row)
    {
        $equip = new Equipement();

        $equip->setId($row['id_equipement']);
        $equip->setLibelle($row['libelle']);

        return $equip;
    }
}