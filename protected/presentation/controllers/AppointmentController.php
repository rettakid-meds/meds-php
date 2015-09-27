<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'AppointmentDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'AppointmentEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'AppointmentBinding.php');

$app->get('/appointments', function () use ($app) {
	global $entityManager;
   	$appointmentEntities = $entityManager->getRepository("AppointmentEntity")->findBy(array());
    $appointments = bindAppointmentEntityArray($appointmentEntities);
    $appointments->printData($app);
});

$app->get('/appointments/:id', function ($id) use ($app) {
	global $entityManager;
	$appointmentEntity = $entityManager->find("AppointmentEntity", $id);
	$appointmentDto = bindAppointmentEntity($appointmentEntity);
	$appointmentDto->printData($app);
});

$app->post('/appointments', function () use ($app) {
	global $entityManager;
	$appointmentDto = new AppointmentDto();
	$appointmentDto = $appointmentDto->bindXml($app);
	$appointmentEntity = bindAppointmentDto($appointmentDto);
	$entityManager->persist($appointmentEntity);
	$entityManager->flush();
	$appointmentDto = bindAppointmentEntity($appointmentEntity);
	$appointmentDto->printData($app);
});

$app->post('/appointments/list', function () use ($app) {
	global $entityManager;
	$appointmentListDto = new AppointmentListDto();
	$appointmentListDto = $appointmentListDto->bindXml($app);
	$appointmentsArray = array();
	foreach ($appointmentListDto->getAppointments() as $appointmentDto) {
		$appointmentEntity = bindAppointmentDto($appointmentDto);
		$entityManager->persist($appointmentEntity);
		$entityManager->flush();
		array_push($appointmentsArray,bindAppointmentEntity($appointmentEntity));
	}
	$appointmentListDto = new AppointmentListDto();
	$appointmentListDto->setAppointments($appointmentsArray);
	$appointmentListDto->printData($app);
});

$app->put('/appointments/:id', function ($id) use ($app) {
	global $entityManager;
	$appointmentEntity = $entityManager->find("AppointmentEntity", $id);
	$entityManager->flush();
	$appointmentDto = bindAppointmentEntity($appointmentEntity);
	$appointmentDto->printData($app);
});

$app->delete('/appointments/:id', function ($id) use ($app) {
	global $entityManager;
	$appointmentEntity = $entityManager->find("AppointmentEntity", $id);
	$entityManager->remove($appointmentEntity);
	$entityManager->flush();
});

/*Referances*/

?>