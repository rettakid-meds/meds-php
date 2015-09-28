<?php

require_once ('protected/common/init/config.php');
require_once ($PROJ_FRAMEWORK_ROOT);
require_once ($PROJ_COMMON_ROOT.'bootstrap.php');

$app = new \Slim\Slim();

require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'DataContentController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'FileController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'ImageController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'UserController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'DevicesTypeController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'UserDeviceController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'TradingHourController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'TradingDayController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'FieldController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'PracticeController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'PracticeFieldController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'DoctorController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'DoctorPracticeController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'AppointmentController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'PrescriptionController.php');
require_once ($PROJ_PRESENTATION_CONTROLLER_ROOT.'PrescriptionItemController.php');

$app->run();

?>