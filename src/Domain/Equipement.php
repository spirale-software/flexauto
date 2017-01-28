<?php
/**
 * Created by Lapi Emo
 * Date: 22-12-16
 * Time: 10:54
 */

namespace Flexauto\Domain;

 class Equipement
{
     /**
      * Id de l'équipement.
      * @var integer
      */
    private $id;

    /**
     * Libelle de l'équipement.
     * @var string
     */
    private $libelle;

     /**
      * @return int
      */
     public function getId()
     {
         return $this->id;
     }

     /**
      * @param int $id
      */
     public function setId($id)
     {
         $this->id = $id;
     }

     /**
      * @return string
      */
     public function getLibelle()
     {
         return $this->libelle;
     }

     /**
      * @param string $libelle
      */
     public function setLibelle($libelle)
     {
         $this->libelle = $libelle;
     }
}