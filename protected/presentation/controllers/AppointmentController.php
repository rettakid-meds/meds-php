<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'AppointmentDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'AppointmentEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'AppointmentBinding.php');

$app->get('/appointments', function () use ($app) {
	global $entityManager;
    $queryArray = getappointmentQueryArray($app);
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

$app->get('/appointments/:id/prescriptions/appointments', function ($id) use ($app) {
	global $entityManager;
   	$prescriptionEntities = $entityManager->getRepository("PrescriptionEntity")->findBy(array('appointment'=>$id));
    $prescription = bindPrescriptionEntityArray($prescriptionEntities);
    $prescription->printData($app);
});

function getappointmentQueryArray($app)    {
    $queryArray = array();
    $appointmentId = $app->request()->get('appointmentId');
    if ($appointmentId != null)	{
        $queryArray['appointmentId'] = $appointmentId;
    }
    $practice = $app->request()->get('practice');
    if ($practice != null)	{
        $queryArray['practice'] = $practice;
    }
    $user = $app->request()->get('user');
    if ($user != null)	{
        $queryArray['user'] = $user;
    }
    $note = $app->request()->get('note');
    if ($note != null)	{
        $queryArray['note'] = $note;
    }
    $expectedFrm = $app->request()->get('expectedFrm');
    if ($expectedFrm != null)	{
        $queryArray['expectedFrm'] = $expectedFrm;
    }
    $expectedTo = $app->request()->get('expectedTo');
    if ($expectedTo != null)	{
        $queryArray['expectedTo'] = $expectedTo;
    }
    $actualFrm = $app->request()->get('actualFrm');
    if ($actualFrm != null)	{
        $queryArray['actualFrm'] = $actualFrm;
    }
    $actualTo = $app->request()->get('actualTo');
    if ($actualTo != null)	{
        $queryArray['actualTo'] = $actualTo;
    }
    return $queryArray;
}

?>