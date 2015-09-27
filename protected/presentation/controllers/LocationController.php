<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'LocationDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'LocationEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'LocationBinding.php');

$app->get('/locations', function () use ($app) {
	global $entityManager;
   	$locationEntities = $entityManager->getRepository("LocationEntity")->findBy(array());
    $locations = bindLocationEntityArray($locationEntities);
    $locations->printData($app);
});

$app->get('/locations/:id', function ($id) use ($app) {
	global $entityManager;
	$locationEntity = $entityManager->find("LocationEntity", $id);
	$locationDto = bindLocationEntity($locationEntity);
	$locationDto->printData($app);
});

$app->post('/locations', function () use ($app) {
	global $entityManager;
	$locationDto = new LocationDto();
	$locationDto = $locationDto->bindXml($app);
	$locationEntity = bindLocationDto($locationDto);
	$entityManager->persist($locationEntity);
	$entityManager->flush();
	$locationDto = bindLocationEntity($locationEntity);
	$locationDto->printData($app);
});

$app->post('/locations/list', function () use ($app) {
	global $entityManager;
	$locationListDto = new LocationListDto();
	$locationListDto = $locationListDto->bindXml($app);
	$locationsArray = array();
	foreach ($locationListDto->getLocations() as $locationDto) {
		$locationEntity = bindLocationDto($locationDto);
		$entityManager->persist($locationEntity);
		$entityManager->flush();
		array_push($locationsArray,bindLocationEntity($locationEntity));
	}
	$locationListDto = new LocationListDto();
	$locationListDto->setLocations($locationsArray);
	$locationListDto->printData($app);
});

$app->put('/locations/:id', function ($id) use ($app) {
	global $entityManager;
	$locationEntity = $entityManager->find("LocationEntity", $id);
	$entityManager->flush();
	$locationDto = bindLocationEntity($locationEntity);
	$locationDto->printData($app);
});

$app->delete('/locations/:id', function ($id) use ($app) {
	global $entityManager;
	$locationEntity = $entityManager->find("LocationEntity", $id);
	$entityManager->remove($locationEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/locations/:id/practices', function ($id) use ($app) {
	global $entityManager;
   	$practiceEntities = $entityManager->getRepository("PracticeEntity")->findBy(array('location'=>$id));
    $practice = bindPracticeEntityArray($practiceEntities);
    $practice->printData($app);
});

?>