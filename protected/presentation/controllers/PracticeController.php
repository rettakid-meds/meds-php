<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PracticeDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'PracticeEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'PracticeBinding.php');

$app->get('/practices', function () use ($app) {
	global $entityManager;
   	$practiceEntities = $entityManager->getRepository("PracticeEntity")->findBy(array());
    $practices = bindPracticeEntityArray($practiceEntities);
    $practices->printData($app);
});

$app->get('/practices/:id', function ($id) use ($app) {
	global $entityManager;
	$practiceEntity = $entityManager->find("PracticeEntity", $id);
	$practiceDto = bindPracticeEntity($practiceEntity);
	$practiceDto->printData($app);
});

$app->post('/practices', function () use ($app) {
	global $entityManager;
	$practiceDto = new PracticeDto();
	$practiceDto = $practiceDto->bindXml($app);
	$practiceEntity = bindPracticeDto($practiceDto);
	$entityManager->persist($practiceEntity);
	$entityManager->flush();
	$practiceDto = bindPracticeEntity($practiceEntity);
	$practiceDto->printData($app);
});

$app->post('/practices/list', function () use ($app) {
	global $entityManager;
	$practiceListDto = new PracticeListDto();
	$practiceListDto = $practiceListDto->bindXml($app);
	$practicesArray = array();
	foreach ($practiceListDto->getPractices() as $practiceDto) {
		$practiceEntity = bindPracticeDto($practiceDto);
		$entityManager->persist($practiceEntity);
		$entityManager->flush();
		array_push($practicesArray,bindPracticeEntity($practiceEntity));
	}
	$practiceListDto = new PracticeListDto();
	$practiceListDto->setPractices($practicesArray);
	$practiceListDto->printData($app);
});

$app->put('/practices/:id', function ($id) use ($app) {
	global $entityManager;
	$practiceEntity = $entityManager->find("PracticeEntity", $id);
	$entityManager->flush();
	$practiceDto = bindPracticeEntity($practiceEntity);
	$practiceDto->printData($app);
});

$app->delete('/practices/:id', function ($id) use ($app) {
	global $entityManager;
	$practiceEntity = $entityManager->find("PracticeEntity", $id);
	$entityManager->remove($practiceEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/practices/:id/practicefields/practices', function ($id) use ($app) {
	global $entityManager;
   	$practiceFieldEntities = $entityManager->getRepository("PracticeFieldEntity")->findBy(array('practice'=>$id));
    $practiceField = bindPracticeFieldEntityArray($practiceFieldEntities);
    $practiceField->printData($app);
});

$app->get('/practices/:id/doctorpractices/practices', function ($id) use ($app) {
	global $entityManager;
   	$doctorPracticeEntities = $entityManager->getRepository("DoctorPracticeEntity")->findBy(array('practice'=>$id));
    $doctorPractice = bindDoctorPracticeEntityArray($doctorPracticeEntities);
    $doctorPractice->printData($app);
});

$app->get('/practices/:id/appointments/practices', function ($id) use ($app) {
	global $entityManager;
   	$appointmentEntities = $entityManager->getRepository("AppointmentEntity")->findBy(array('practice'=>$id));
    $appointment = bindAppointmentEntityArray($appointmentEntities);
    $appointment->printData($app);
});

?>