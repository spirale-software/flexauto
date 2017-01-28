<?php

namespace Flexauto\Domain;


class CompleteAuto
{
    /**
     * @var Auto
     */
    private $auto;

    /**
     * @var array of Equipement
     */
    private $equipements;

    /**
     * @var array of Image
     */
    private $images;

    /**
     * @var Image
     */
    private $defaultImage;

    /**
     * @return Auto
     */
    public function getAuto()
    {
        return $this->auto;
    }

    /**
     * @param Auto $auto
     */
    public function setAuto($auto)
    {
        $this->auto = $auto;
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
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param array $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return Image
     */
    public function getDefaultImage()
    {
        return $this->defaultImage;
    }

    /**
     * @param Image $defaultImage
     */
    public function setDefaultImage($defaultImage)
    {
        $this->defaultImage = $defaultImage;
    }
}