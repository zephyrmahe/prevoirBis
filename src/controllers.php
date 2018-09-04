<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));
// accueil et connexion------------------------------------------------------------------------------------
$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})
->bind('homepage')
;

// page e-mail----------------------------------------------------------------------------------------------
$app->get('/email', function () use ($app) {
    return $app['twig']->render('mail.html.twig', array());
})
->bind('mail')
;

// visuel client--------------------------------------------------------------------------------------------
$app->get('/visuelclient', function () use ($app) {
    return $app['twig']->render('visuelClient.html.twig', array());
})
->bind('visuelClient')
;

// modif mot de passe---------------------------------------------------------------------------------------
$app->get('/modifMDP', function () use ($app) {
    return $app['twig']->render('modifMDP.html.twig', array());
})
->bind('modifMDP')
;

// page creer session---------------------------------------------------------------------------------------
$app->get('/sessionCreate', function () use ($app) {
    return $app['twig']->render('sessionCreate.html.twig', array());
})
->bind('sessionCreate')
;

// page historique des session------------------------------------------------------------------------------
$app->get('/historique', function () use ($app) {
    return $app['twig']->render('historique.html.twig', array());
})
->bind('historique')
;

// page finir session---------------------------------------------------------------------------------------
$app->get('/sessionFinish', function () use ($app) {
    return $app['twig']->render('sessionFinish.html.twig', array());
})
->bind('sessionFinish')
;

// modification de la session-------------------------------------------------------------------------------
$app->get('/sessionModif', function () use ($app) {
    return $app['twig']->render('modifSession.html.twig', array());
})
->bind('modifSession')
;

// creer et modifier un scenario----------------------------------------------------------------------------
$app->get('/scenario', function () use ($app) {
    return $app['twig']->render('scenario.html.twig', array());
})
->bind('scenario')
;

// gerer les sous admin-------------------------------------------------------------------------------------
$app->get('/gestionSousAdmin', function () use ($app) {
    return $app['twig']->render('sousAdminGest.html.twig', array());
})
->bind('SousAdmin')
;

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
