<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PrescriptionItemDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'PrescriptionItemEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'PrescriptionItemBinding.php');

$app->get('/prescriptionitems', function () use ($app) {
	global $entityManager;
    $queryArray = getprescriptionItemQueryArray($app);
    $prescriptionItemEntities = $entityManager->getRepository("PrescriptionItemEntity")->findBy(array());
    $prescriptionItems = bindPrescriptionItemEntityArray($prescriptionItemEntities);
    $prescriptionItems->printData($app);
});

$app->get('/prescriptionitems/:id', function ($id) use ($app) {
	global $entityManager;
	$prescriptionItemEntity = $entityManager->find("PrescriptionItemEntity", $id);
	$prescriptionItemDto = bindPrescriptionItemEntity($prescriptionItemEntity);
	$prescriptionItemDto->printData($app);
});

$app->post('/prescriptionitems', function () use ($app) {
	global $entityManager;
	$prescriptionItemDto = new PrescriptionItemDto();
	$prescriptionItemDto = $prescriptionItemDto->bindXml($app);
	$prescriptionItemEntity = bindPrescriptionItemDto($prescriptionItemDto);
	$entityManager->persist($prescriptionItemEntity);
	$entityManager->flush();
	$prescriptionItemDto = bindPrescriptionItemEntity($prescriptionItemEntity);
	$prescriptionItemDto->printData($app);
});

$app->post('/prescriptionitems/list', function () use ($app) {
	global $entityManager;
	$prescriptionItemListDto = new PrescriptionItemListDto();
	$prescriptionItemListDto = $prescriptionItemListDto->bindXml($app);
	$prescriptionItemsArray = array();
	foreach ($prescriptionItemListDto->getPrescriptionItems() as $prescriptionItemDto) {
		$prescriptionItemEntity = bindPrescriptionItemDto($prescriptionItemDto);
		$entityManager->persist($prescriptionItemEntity);
		$entityManager->flush();
		array_push($prescriptionItemsArray,bindPrescriptionItemEntity($prescriptionItemEntity));
	}
	$prescriptionItemListDto = new PrescriptionItemListDto();
	$prescriptionItemListDto->setPrescriptionItems($prescriptionItemsArray);
	$prescriptionItemListDto->printData($app);
});

$app->put('/prescriptionitems/:id', function ($id) use ($app) {
	global $entityManager;
	$prescriptionItemEntity = $entityManager->find("PrescriptionItemEntity", $id);
	$entityManager->flush();
	$prescriptionItemDto = bindPrescriptionItemEntity($prescriptionItemEntity);
	$prescriptionItemDto->printData($app);
});

$app->delete('/prescriptionitems/:id', function ($id) use ($app) {
	global $entityManager;
	$prescriptionItemEntity = $entityManager->find("PrescriptionItemEntity", $id);
	$entityManager->remove($prescriptionItemEntity);
	$entityManager->flush();
});

/*Referances*/

function getprescriptionItemQueryArray($app)    {
    $queryArray = array();
    $prescriptionItemId = $app->request()->get('prescriptionItemId');
    if ($prescriptionItemId != null)	{
        $queryArray['prescriptionItemId'] = $prescriptionItemId;
    }
    $prescription = $app->request()->get('prescription');
    if ($prescription != null)	{
        $queryArray['prescription'] = $prescription;
    }
    $name = $app->request()->get('name');
    if ($name != null)	{
        $queryArray['name'] = $name;
    }
    return $queryArray;
}

?>