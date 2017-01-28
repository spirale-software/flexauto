<?php
/**
 * Created by Lapi Emo
 * Date: 20-12-16
 * Time: 10:30
 */
namespace Flexauto\Domain;
class Image
{
    /**
     * Id du media.
     * @var integer
     */
    private $id;

    /**
     * Chemin du fichier correspondant à ce média.
     * @var string
     */
    private $pathname;

    /**
     * Id de l'auto à laquelle appartient le média.
     * @var integer
     */
    private $autoFK;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $idMedia
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getPathname()
    {
        return $this->pathname;
    }

    /**
     * @param string $pathname
     */
    public function setPathname($pathname)
    {
        $this->pathname = $pathname;
    }

    /**
     * @return int
     */
    public function getAutoFK()
    {
        return $this->autoFK;
    }

    /**
     * @param int $autoFK
     */
    public function setAutoFK($autoFK)
    {
        $this->autoFK = $autoFK;
    }
}