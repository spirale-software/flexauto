<?php

namespace Flexauto\Controller;

use flexauto\Domain\Auto;
use Flexauto\Domain\CompleteAuto;
use Flexauto\Form\Manager\AutoManager;
use flexauto\Form\Type\AutoType;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

include_once __DIR__ . '/../Form/Type/AutoType.php';
include_once __DIR__ . '/../Form/Manager/AutoManager.php';
include_once __DIR__ . '/../Domain/Auto.php';
include_once __DIR__ . '/../Domain/CompleteAuto.php';
class AdminController
{
    private  $arrayOfCompleteAutos;

    public function dashboard_action(Application $app)
    {
        return $app['twig']->render('adminViews/dashboard.html.twig',
            array(
                'active'=>1));
    }

    public function login_action(Application $app, Request $request)
    {
        return $app['twig']->render('publicViews/login.html.twig',
            array(
                'error' => $app['security.last_error']($request),
                'last_username' => $app['session']->get('_security.last_username'),
        ));
    }

    public function add_auto_action(Application $app, Request $request)
    {
        $auto_manager = new AutoManager();
        $auto_type = new AutoType();

        $_equipements = $app['dao.equipement']->find_all();
        $equipements = array();
        foreach ($_equipements as $key => $value) {
            $equipements[$key] = $value->getLibelle();
        }
        $auto_type->setEquipements($equipements);

        $auto_form = $app['form.factory']->create($auto_type, $auto_manager);

        $auto_form->handleRequest($request);

        if ($auto_form->isSubmitted() && $auto_form->isValid()) {

            $newAuto = $auto_manager->createNewAuto();
            $autoId = $app['dao.auto']->insert($newAuto);

            $autoImages = $auto_manager->getAutoImages();
            $this->saveAllImagesInImageFile($autoId, $autoImages);
            $app['dao.image']->insertImages($autoImages);

            $idOfAllEquipements = $auto_manager->getEquipements();
            $app['dao.autoEquipement']->insertAutoEquipements($autoId, $idOfAllEquipements);

            $app['session']->getFlashBag()->add('success', 'L\'auto a bien été enregistré');
        }

        return $app['twig']->render('adminViews/auto_form.html.twig', array(
            'auto_form' => $auto_form->createView(),
            'title' => 'Nouvel auto',
            'active' => 2));
    }

    public function getAllAutosAction(Application $app, Request $request)
    {
        $this->setCompleteAutos($app, $request);

        return $app['twig']->render('adminViews/allAutos.html.twig', array(
            'title' => 'Tous les autos',
            'active' => 3,
            'completeAutos' => $this->arrayOfCompleteAutos
        ));
    }

    public function editAutoAction(Application $app, Request $request, $idAuto)
    {
        $completeAuto = $this->getCompleteAutoByIdAuto($idAuto);

        return $app['twig']->render('adminViews/editAuto.html.twig', array(
            'title' => 'Modifier auto',
            'active' => 0,
            'completeAuto' => $completeAuto
        ));
    }

    public function detailAutoAction(Application $app, Request $request, $idAuto)
    {
        $this->setCompleteAutos($app, $request);
        $completeAuto = $this->getCompleteAutoByIdAuto($idAuto);

        return $app['twig']->render('adminViews/detailAuto.html.twig', array(
            'title' => 'Détail Du Véhicule:',
            'active' => 0,
            'completeAuto' => $completeAuto
        ));
    }

    private function saveAllImagesInImageFile($autoId, $images)
    {
        $directory = __DIR__ . '/../../web/images/';

        foreach ($images as $image) {
            $file = $image->getPathname();
            $fileId = uniqid();
            $fileName = $fileId . '.' . $file->guessExtension();
            $file->move($directory, $fileName);

            $image->setPathname($fileName);
            $image->setAutoFK($autoId);
        }

        return $images;
    }

    private function getCompleteAutoByIdAuto($idAuto)
    {
        return $this->arrayOfCompleteAutos[$idAuto];
    }

    private function setCompleteAutos(Application $app, Request $request)
    {
        $arrayOfAutos = $app['dao.auto']->getAllAutos();

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

            $this->arrayOfCompleteAutos[$idAuto] = $newCompleteAuto;
        }
    }
}