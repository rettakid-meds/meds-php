<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDeviceDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'UserDeviceEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'UserDeviceBinding.php');

$app->get('/userdevices', function () use ($app) {
	global $entityManager;
   	$userDeviceEntities = $entityManager->getRepository("UserDeviceEntity")->findBy(array());
    $userDevices = bindUserDeviceEntityArray($userDeviceEntities);
    $userDevices->printData($app);
});

$app->get('/userdevices/:id', function ($id) use ($app) {
	global $entityManager;
	$userDeviceEntity = $entityManager->find("UserDeviceEntity", $id);
	$userDeviceDto = bindUserDeviceEntity($userDeviceEntity);
	$userDeviceDto->printData($app);
});

$app->post('/userdevices', function () use ($app) {
	global $entityManager;
	$userDeviceDto = new UserDeviceDto();
	$userDeviceDto = $userDeviceDto->bindXml($app);
	$userDeviceEntity = bindUserDeviceDto($userDeviceDto);
	$entityManager->persist($userDeviceEntity);
	$entityManager->flush();
	$userDeviceDto = bindUserDeviceEntity($userDeviceEntity);
	$userDeviceDto->printData($app);
});

$app->post('/userdevices/list', function () use ($app) {
	global $entityManager;
	$userDeviceListDto = new UserDeviceListDto();
	$userDeviceListDto = $userDeviceListDto->bindXml($app);
	$userDevicesArray = array();
	foreach ($userDeviceListDto->getUserDevices() as $userDeviceDto) {
		$userDeviceEntity = bindUserDeviceDto($userDeviceDto);
		$entityManager->persist($userDeviceEntity);
		$entityManager->flush();
		array_push($userDevicesArray,bindUserDeviceEntity($userDeviceEntity));
	}
	$userDeviceListDto = new UserDeviceListDto();
	$userDeviceListDto->setUserDevices($userDevicesArray);
	$userDeviceListDto->printData($app);
});

$app->put('/userdevices/:id', function ($id) use ($app) {
	global $entityManager;
	$userDeviceEntity = $entityManager->find("UserDeviceEntity", $id);
	$entityManager->flush();
	$userDeviceDto = bindUserDeviceEntity($userDeviceEntity);
	$userDeviceDto->printData($app);
});

$app->delete('/userdevices/:id', function ($id) use ($app) {
	global $entityManager;
	$userDeviceEntity = $entityManager->find("UserDeviceEntity", $id);
	$entityManager->remove($userDeviceEntity);
	$entityManager->flush();
});

/*Referances*/

?>