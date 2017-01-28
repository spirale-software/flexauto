<?php
namespace Flexauto\DAO;
/**
 * Created by PhpStorm.
 * User: Lapi Emo
 * Date: 20-12-16
 * Time: 10:37
 */
use Flexauto\Domain\Image;
class ImageDAO extends DAO
{

    public function insertImages($autoImages)
    {
        foreach ($autoImages as $image)
        {
            $associativeArray = $this->getImageObjectAsAssociativeArray($image);
            $this->getDb()->insert('t_image', $associativeArray );
        }
    }

    public function getImagesByIdAuto($idAuto)
    {
        $query = 'SELECT * FROM t_image WHERE auto_fk = ?';
        $associativeArray = $this->getDb()->fetchAll($query, array($idAuto));

        $arrayOfImages = array();
        foreach ($associativeArray as $row)
        {
            $idImage = $row['id_image'];
            $image = $this->buildDomainObject($row);

            $arrayOfImages[$idImage] = $image;
        }

        return $arrayOfImages;
    }

    protected  function buildDomainObject($row)
    {
        $newImage = new Image();

        $newImage->setId($row['id_image']);
        $newImage->setPathname($row['pathname']);
        $newImage->setAutoFK($row['auto_fk']);

        return $newImage;
    }

    public function getImageObjectAsAssociativeArray(Image $image)
    {
        return array(
            'auto_fk' => $image->getAutoFK(),
            'pathname' => $image->getPathname()
        );
    }
}