<?php
const DEFAULT_APP = 'Frontend';

// Si l'application n'est pas valide, on va charger l'application par défaut qui se chargera de générer une erreur 404
if (!isset($_GET['app']) || !file_exists(__DIR__.'/../Application/'.$_GET['app'])) $_GET['app'] = DEFAULT_APP;

// On commence par inclure la classe nous permettant d'enregistrer nos autoload
require __DIR__.'/../libraries/Framework/SplClassLoader.php';

// On va ensuite enregistrer les autoloads correspondant à chaque vendor (OCFram, App, Model, etc.)
$OCFramLoader = new SplClassLoader('Framework', __DIR__.'/../libraries');
$OCFramLoader->register();

$OCConfLoader = new SplClassLoader('Config', __DIR__.'/../Application');
$OCConfLoader->register();

$appLoader = new SplClassLoader('Application', __DIR__.'/..');
$appLoader->register();

$webLoader = new SplClassLoader('Web', __DIR__.'/../Web');
$webLoader->register();

$modelLoader = new SplClassLoader('Model', __DIR__.'/../libraries/vendors');
$modelLoader->register();

$entityLoader = new SplClassLoader('Entity', __DIR__.'/../libraries/vendors');
$entityLoader->register();

// Il ne nous suffit plus qu'à déduire le nom de la classe et à l'instancier
$appClass = 'Application\\'.$_GET['app'].'\\'.$_GET['app'].'Application';
$app = new $appClass;

