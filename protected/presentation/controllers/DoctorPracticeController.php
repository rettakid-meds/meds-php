<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'DoctorPracticeDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'DoctorPracticeEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'DoctorPracticeBinding.php');

$app->get('/doctorpractices', function () use ($app) {
	global $entityManager;
   	$doctorPracticeEntities = $entityManager->getRepository("DoctorPracticeEntity")->findBy(array());
    $doctorPractices = bindDoctorPracticeEntityArray($doctorPracticeEntities);
    $doctorPractices->printData($app);
});

$app->get('/doctorpractices/:id', function ($id) use ($app) {
	global $entityManager;
	$doctorPracticeEntity = $entityManager->find("DoctorPracticeEntity", $id);
	$doctorPracticeDto = bindDoctorPracticeEntity($doctorPracticeEntity);
	$doctorPracticeDto->printData($app);
});

$app->post('/doctorpractices', function () use ($app) {
	global $entityManager;
	$doctorPracticeDto = new DoctorPracticeDto();
	$doctorPracticeDto = $doctorPracticeDto->bindXml($app);
	$doctorPracticeEntity = bindDoctorPracticeDto($doctorPracticeDto);
	$entityManager->persist($doctorPracticeEntity);
	$entityManager->flush();
	$doctorPracticeDto = bindDoctorPracticeEntity($doctorPracticeEntity);
	$doctorPracticeDto->printData($app);
});

$app->post('/doctorpractices/list', function () use ($app) {
	global $entityManager;
	$doctorPracticeListDto = new DoctorPracticeListDto();
	$doctorPracticeListDto = $doctorPracticeListDto->bindXml($app);
	$doctorPracticesArray = array();
	foreach ($doctorPracticeListDto->getDoctorPractices() as $doctorPracticeDto) {
		$doctorPracticeEntity = bindDoctorPracticeDto($doctorPracticeDto);
		$entityManager->persist($doctorPracticeEntity);
		$entityManager->flush();
		array_push($doctorPracticesArray,bindDoctorPracticeEntity($doctorPracticeEntity));
	}
	$doctorPracticeListDto = new DoctorPracticeListDto();
	$doctorPracticeListDto->setDoctorPractices($doctorPracticesArray);
	$doctorPracticeListDto->printData($app);
});

$app->put('/doctorpractices/:id', function ($id) use ($app) {
	global $entityManager;
	$doctorPracticeEntity = $entityManager->find("DoctorPracticeEntity", $id);
	$entityManager->flush();
	$doctorPracticeDto = bindDoctorPracticeEntity($doctorPracticeEntity);
	$doctorPracticeDto->printData($app);
});

$app->delete('/doctorpractices/:id', function ($id) use ($app) {
	global $entityManager;
	$doctorPracticeEntity = $entityManager->find("DoctorPracticeEntity", $id);
	$entityManager->remove($doctorPracticeEntity);
	$entityManager->flush();
});

/*Referances*/

?>