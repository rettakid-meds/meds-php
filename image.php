<?php

require_once ('protected/common/init/config.php');
require_once ($PROJ_FRAMEWORK_ROOT);

$app = new \Slim\Slim();

$app->get('/:id', function ($id) use($app) {
    $file = 'images/'.$id;
    $app->response->headers->set('Content-Type','image/jpeg');
    $app->response->headers->set('Content-Length', filesize($file));
    echo file_get_contents($file);
});

$app->run();

?>