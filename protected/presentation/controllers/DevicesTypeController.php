<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'DevicesTypeDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'DevicesTypeEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'DevicesTypeBinding.php');

$app->get('/devicestypes', function () use ($app) {
	global $entityManager;
    $queryArray = getdevicesTypeQueryArray($app);
    $devicesTypeEntities = $entityManager->getRepository("DevicesTypeEntity")->findBy(array());
    $devicesTypes = bindDevicesTypeEntityArray($devicesTypeEntities);
    $devicesTypes->printData($app);
});

$app->get('/devicestypes/:id', function ($id) use ($app) {
	global $entityManager;
	$devicesTypeEntity = $entityManager->find("DevicesTypeEntity", $id);
	$devicesTypeDto = bindDevicesTypeEntity($devicesTypeEntity);
	$devicesTypeDto->printData($app);
});

$app->post('/devicestypes', function () use ($app) {
	global $entityManager;
	$devicesTypeDto = new DevicesTypeDto();
	$devicesTypeDto = $devicesTypeDto->bindXml($app);
	$devicesTypeEntity = bindDevicesTypeDto($devicesTypeDto);
	$entityManager->persist($devicesTypeEntity);
	$entityManager->flush();
	$devicesTypeDto = bindDevicesTypeEntity($devicesTypeEntity);
	$devicesTypeDto->printData($app);
});

$app->post('/devicestypes/list', function () use ($app) {
	global $entityManager;
	$devicesTypeListDto = new DevicesTypeListDto();
	$devicesTypeListDto = $devicesTypeListDto->bindXml($app);
	$devicesTypesArray = array();
	foreach ($devicesTypeListDto->getDevicesTypes() as $devicesTypeDto) {
		$devicesTypeEntity = bindDevicesTypeDto($devicesTypeDto);
		$entityManager->persist($devicesTypeEntity);
		$entityManager->flush();
		array_push($devicesTypesArray,bindDevicesTypeEntity($devicesTypeEntity));
	}
	$devicesTypeListDto = new DevicesTypeListDto();
	$devicesTypeListDto->setDevicesTypes($devicesTypesArray);
	$devicesTypeListDto->printData($app);
});

$app->put('/devicestypes/:id', function ($id) use ($app) {
	global $entityManager;
	$devicesTypeEntity = $entityManager->find("DevicesTypeEntity", $id);
	$entityManager->flush();
	$devicesTypeDto = bindDevicesTypeEntity($devicesTypeEntity);
	$devicesTypeDto->printData($app);
});

$app->delete('/devicestypes/:id', function ($id) use ($app) {
	global $entityManager;
	$devicesTypeEntity = $entityManager->find("DevicesTypeEntity", $id);
	$entityManager->remove($devicesTypeEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/devicestypes/:id/userdevices/types', function ($id) use ($app) {
	global $entityManager;
   	$userDeviceEntities = $entityManager->getRepository("UserDeviceEntity")->findBy(array('type'=>$id));
    $userDevice = bindUserDeviceEntityArray($userDeviceEntities);
    $userDevice->printData($app);
});

function getdevicesTypeQueryArray($app)    {
    $queryArray = array();
    $devicesTypeId = $app->request()->get('devicesTypeId');
    if ($devicesTypeId != null)	{
        $queryArray['devicesTypeId'] = $devicesTypeId;
    }
    $typeName = $app->request()->get('typeName');
    if ($typeName != null)	{
        $queryArray['typeName'] = $typeName;
    }
    $canPush = $app->request()->get('canPush');
    if ($canPush != null)	{
        $queryArray['canPush'] = $canPush;
    }
    return $queryArray;
}

?>