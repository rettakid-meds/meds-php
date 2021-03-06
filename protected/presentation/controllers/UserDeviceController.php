<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDeviceDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'UserDeviceEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'UserDeviceBinding.php');

$app->get('/userdevices', function () use ($app) {
	global $entityManager;
    $queryArray = getuserDeviceQueryArray($app);
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

function getuserDeviceQueryArray($app)    {
    $queryArray = array();
    $userDevicesId = $app->request()->get('userDevicesId');
    if ($userDevicesId != null)	{
        $queryArray['userDevicesId'] = $userDevicesId;
    }
    $user = $app->request()->get('user');
    if ($user != null)	{
        $queryArray['user'] = $user;
    }
    $type = $app->request()->get('type');
    if ($type != null)	{
        $queryArray['type'] = $type;
    }
    $name = $app->request()->get('name');
    if ($name != null)	{
        $queryArray['name'] = $name;
    }
    $devicePushId = $app->request()->get('devicePushId');
    if ($devicePushId != null)	{
        $queryArray['devicePushId'] = $devicePushId;
    }
    return $queryArray;
}

?>