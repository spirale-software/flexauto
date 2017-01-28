<?php
namespace Flexauto\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Flexauto\Domain\CompleteAuto;

class HomeController
{
    /**
     * @param Application $app
     * @return accueil.html.twig
     */
    public function indexAction(Application $app)
    {
        $arrayOfAutos = $app['dao.auto']->getAutos();
        $arrayOfCompleteAutos = $this->getCompleteAutos($app, $arrayOfAutos);

        return $app['twig']->render('publicViews/index.html.twig', array(
            'arrayOfCompleteAutos'=>$arrayOfCompleteAutos
        ));
    }

    /**
     * @param Application $app
     * @return index.html.twig
     */
    public function contactAction(Application $app)
    {
        return $app['twig']->render('publicViews/contact.html.twig');
    }

    /**
     * @param Application $app
     * @return index.html.twig
     */
    public function servicesAction(Application $app)
    {
        return $app['twig']->render('publicViews/services.html.twig');
    }

    /**
     * @param Application $app
     * @return index.html.twig
     */
    public function aProposAction(Application $app)
    {
        return $app['twig']->render('publicViews/a_propos.html.twig');
    }

    /**
     * @param Application $app
     * @param $arrayOfAutos
     * @return array
     */
    private function getCompleteAutos(Application $app, $arrayOfAutos)
    {
        $arrayOfCompleteAutos = array();

        foreach ($arrayOfAutos as $auto)
        {
            $idAuto = $auto->getIdAuto();

            $arrayOfImages = $app['dao.image']->getImagesByIdAuto($idAuto);
            $arrayOfIdEquipements = $app['dao.autoEquipement']->getIdEquipementsByIdAuto($idAuto);
            $arrayOfEquipements = $app['dao.equipement']->getEquipementsById($arrayOfIdEquipements);

            //var_dump($arrayOfIdEquipements); die();

            $newCompleteAuto = new CompleteAuto();
            $newCompleteAuto->setAuto($auto);
            $newCompleteAuto->setImages($arrayOfImages);
            $newCompleteAuto->setEquipements($arrayOfEquipements);
            $newCompleteAuto->setDefaultImage(array_shift($arrayOfImages));

            //var_dump($newCompleteAuto->getDefaultImage()); die();

            $arrayOfCompleteAutos[$idAuto] = $newCompleteAuto;
        }

        return $arrayOfCompleteAutos;
    }
}