<?php
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

require_once __DIR__.'/../src/DAO/EquipementDAO.php';
require_once __DIR__.'/../src/DAO/AutoDAO.php';
require_once __DIR__.'/../src/DAO/ImageDAO.php';
require_once __DIR__.'/../src/DAO/AutoEquipementDAO.php';


// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
/*$app['twig'] = $app->share($app->extend('twig', function(Twig_Environment $twig, $app) {
    $twig->addExtension(new Twig_Extensions_Extension_Text());
    return $twig;
}));*/
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());

$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'secured' => array(
            'pattern' => '^/admin/',
            'logout' => array('logout_path' => '/admin/logout', 'invalidate_session' => true),
            'form' => array(
                'login_path' => '/login',
                'check_path' => '/admin/login_check'),
            'users' => array(
                // raw password is foo
                'admin' => array('ROLE_ADMIN', '5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg=='),
            ),
        ),
    ),
    'security.role_hierarchy' => array('ROLE_ADMIN' => array('ROLE_USER')),
    'security.access_rule' => array(array('^/admin', 'ROLE_ADMIN'))
));

// Register services
$app['dao.equipement'] = $app->share(function ($app) {
    return new Flexauto\DAO\EquipementDAO($app['db']);
});

$app['dao.auto'] = $app->share(function ($app) {
    return new Flexauto\DAO\AutoDAO($app['db']);
});

$app['dao.image'] = $app->share(function ($app) {
    return new Flexauto\DAO\ImageDAO($app['db']);
});

$app['dao.autoEquipement'] = $app->share(function ($app) {
    return new Flexauto\DAO\AutoEquipementDAO($app['db']);
});