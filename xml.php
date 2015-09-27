<?php

require_once ('protected/common/init/config.php');
require_once ($PROJ_FRAMEWORK_ROOT);
require_once ($PROJ_COMMON_ROOT.'bootstrap.php');

$app = new \Slim\Slim();

require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'DataContentController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'UserController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'DevicesTypeController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'UserDeviceController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'LocationController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'PracticeController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'AppointmentController.php');

$app->run();

?>