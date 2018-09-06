<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\Query\Expr\Join;

//Request::setTrustedProxies(array('127.0.0.1'));
// accueil et connexion------------------------------------------------------------------------------------
$app->get('/', function (Request $request) use ($app) {

  //Test si $_POST n'est pas vide
  if (!empty($_POST)) {
    //Récupération du pseudo et du mot de passe écrit dans le formulaire
    $username = $request->get('user');
    $mdp = $request->get('password');

    //Cherche dans la base de données si le user existe
    $repository = $app['em']->getRepository(Entity\Admin::class);
    $query = $repository->findOneBy(['name' => $username]);   

    //Test le retour de la requete précédente et test le mot de passe chiffrer
    if ($query != null && password_verify($mdp, $query->getPassword())) {

      //Si toute les conditions sont remplies, on stock dans le cookie de session les données requis
      $app['session']->set(array('user', 'name' => $query->getName(), 
        'access' => $query->getAccess(),
        'id' => $query->getId()
      ));

 $app['global.username'] = $app['session']->get('user')['name'];
   return $app['twig']->render('mail.html.twig',array());
    }
  }
  return $app['twig']->render('index.html.twig',array());

})
->bind('homepage')
->method('GET|POST')
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
      //Déclaration du tableau de retour de données pour twig
  $dataInscription = array();
  
  //Test si $_POST n'est pas vide
  if (!empty($_POST)){
    foreach($_POST as $key => $value){
      $post[$key] = $value;
    }
        
    //initialisation du tableau des erreurs
    $errors = array();
    //différent test pour voir si il y'a des erreur
    if(strlen($post['admin']) < 3){
      $errors[] = 'Le prénom doit comporter au moins 3 caractères';
    }
    
    //Test si le tableau $errors est vide
    if(count($errors) == 0){
      //Sotckage des données dans la base de données
      $admin = new Entity\Admin();
      $admin->setName($post['admin']);
      //Chiffrage du mot de passe
      $mdp = 'password';
      $hash_mdp = password_hash($mdp, PASSWORD_DEFAULT);
      $admin->setPassword($hash_mdp);
      $admin->setAccess(1);
      $app['em']->persist($admin);
      $app['em']->flush();
    }
    //Test si le tableau $errors n'est pas vide
    if(!empty($errors)){
      //Stockage de la liste des erreurs dans tableau $dataInscription pour rendue twig
      $dataInscription = ['errors' => $errors];
    }
  }
    return $app['twig']->render('sousAdminGest.html.twig', array());
})
->bind('SousAdmin')
->method('GET|POST')

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
