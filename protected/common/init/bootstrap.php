<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array($PROJ_PERSISTENCE_ENTITY_ROOT), $isDevMode);

$conn = array(
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'dbname'   => 'MEDS',
    'user'     => 'root',
    'password' => 'asaneb17'
);

$entityManager = EntityManager::create($conn, $config);

?>