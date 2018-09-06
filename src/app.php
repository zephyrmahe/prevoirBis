<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());

if (null !== $app['session']->get('user')) {
	$app['global.userName'] = $app['session']->get('user')['name'];
}
else{
	$app['global.userName'] = '';
}
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    $twig->addGlobal('userName', $app['global.userName']);
    return $twig;
});

$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

//Debut attribution doctrine orm (EntityManager) dans $app['em']
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/Entity"), $isDevMode);
$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'prevoirbis',
    'charset'  => 'utf8',
);
$app['em'] = EntityManager::create($conn, $config);
//Fin attribution doctrine orm (EntityManager) dans $app['em']

return $app;
