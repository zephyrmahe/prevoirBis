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

$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

return $app;
