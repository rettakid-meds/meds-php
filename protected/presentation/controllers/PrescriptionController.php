<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PrescriptionDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'PrescriptionEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'PrescriptionBinding.php');

$app->get('/prescriptions', function () use ($app) {
	global $entityManager;
    $queryArray = getprescriptionQueryArray($app);
    $prescriptionEntities = $entityManager->getRepository("PrescriptionEntity")->findBy(array());
    $prescriptions = bindPrescriptionEntityArray($prescriptionEntities);
    $prescriptions->printData($app);
});

$app->get('/prescriptions/:id', function ($id) use ($app) {
	global $entityManager;
	$prescriptionEntity = $entityManager->find("PrescriptionEntity", $id);
	$prescriptionDto = bindPrescriptionEntity($prescriptionEntity);
	$prescriptionDto->printData($app);
});

$app->post('/prescriptions', function () use ($app) {
	global $entityManager;
	$prescriptionDto = new PrescriptionDto();
	$prescriptionDto = $prescriptionDto->bindXml($app);
	$prescriptionEntity = bindPrescriptionDto($prescriptionDto);
	$entityManager->persist($prescriptionEntity);
	$entityManager->flush();
	$prescriptionDto = bindPrescriptionEntity($prescriptionEntity);
	$prescriptionDto->printData($app);
});

$app->post('/prescriptions/list', function () use ($app) {
	global $entityManager;
	$prescriptionListDto = new PrescriptionListDto();
	$prescriptionListDto = $prescriptionListDto->bindXml($app);
	$prescriptionsArray = array();
	foreach ($prescriptionListDto->getPrescriptions() as $prescriptionDto) {
		$prescriptionEntity = bindPrescriptionDto($prescriptionDto);
		$entityManager->persist($prescriptionEntity);
		$entityManager->flush();
		array_push($prescriptionsArray,bindPrescriptionEntity($prescriptionEntity));
	}
	$prescriptionListDto = new PrescriptionListDto();
	$prescriptionListDto->setPrescriptions($prescriptionsArray);
	$prescriptionListDto->printData($app);
});

$app->put('/prescriptions/:id', function ($id) use ($app) {
	global $entityManager;
	$prescriptionEntity = $entityManager->find("PrescriptionEntity", $id);
	$entityManager->flush();
	$prescriptionDto = bindPrescriptionEntity($prescriptionEntity);
	$prescriptionDto->printData($app);
});

$app->delete('/prescriptions/:id', function ($id) use ($app) {
	global $entityManager;
	$prescriptionEntity = $entityManager->find("PrescriptionEntity", $id);
	$entityManager->remove($prescriptionEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/prescriptions/:id/prescriptionitems/prescriptions', function ($id) use ($app) {
	global $entityManager;
   	$prescriptionItemEntities = $entityManager->getRepository("PrescriptionItemEntity")->findBy(array('prescription'=>$id));
    $prescriptionItem = bindPrescriptionItemEntityArray($prescriptionItemEntities);
    $prescriptionItem->printData($app);
});

function getprescriptionQueryArray($app)    {
    $queryArray = array();
    $prescriptionId = $app->request()->get('prescriptionId');
    if ($prescriptionId != null)	{
        $queryArray['prescriptionId'] = $prescriptionId;
    }
    $appointment = $app->request()->get('appointment');
    if ($appointment != null)	{
        $queryArray['appointment'] = $appointment;
    }
    $doctor = $app->request()->get('doctor');
    if ($doctor != null)	{
        $queryArray['doctor'] = $doctor;
    }
    $user = $app->request()->get('user');
    if ($user != null)	{
        $queryArray['user'] = $user;
    }
    $file = $app->request()->get('file');
    if ($file != null)	{
        $queryArray['file'] = $file;
    }
    $effFrm = $app->request()->get('effFrm');
    if ($effFrm != null)	{
        $queryArray['effFrm'] = $effFrm;
    }
    $effTo = $app->request()->get('effTo');
    if ($effTo != null)	{
        $queryArray['effTo'] = $effTo;
    }
    return $queryArray;
}

?>