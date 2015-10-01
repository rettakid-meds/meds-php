<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'DoctorDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'DoctorEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'DoctorBinding.php');

$app->get('/doctors', function () use ($app) {
	global $entityManager;
    $queryArray = getdoctorQueryArray($app);
    $doctorEntities = $entityManager->getRepository("DoctorEntity")->findBy(array());
    $doctors = bindDoctorEntityArray($doctorEntities);
    $doctors->printData($app);
});

$app->get('/doctors/:id', function ($id) use ($app) {
	global $entityManager;
	$doctorEntity = $entityManager->find("DoctorEntity", $id);
	$doctorDto = bindDoctorEntity($doctorEntity);
	$doctorDto->printData($app);
});

$app->post('/doctors', function () use ($app) {
	global $entityManager;
	$doctorDto = new DoctorDto();
	$doctorDto = $doctorDto->bindXml($app);
	$doctorEntity = bindDoctorDto($doctorDto);
	$entityManager->persist($doctorEntity);
	$entityManager->flush();
	$doctorDto = bindDoctorEntity($doctorEntity);
	$doctorDto->printData($app);
});

$app->post('/doctors/list', function () use ($app) {
	global $entityManager;
	$doctorListDto = new DoctorListDto();
	$doctorListDto = $doctorListDto->bindXml($app);
	$doctorsArray = array();
	foreach ($doctorListDto->getDoctors() as $doctorDto) {
		$doctorEntity = bindDoctorDto($doctorDto);
		$entityManager->persist($doctorEntity);
		$entityManager->flush();
		array_push($doctorsArray,bindDoctorEntity($doctorEntity));
	}
	$doctorListDto = new DoctorListDto();
	$doctorListDto->setDoctors($doctorsArray);
	$doctorListDto->printData($app);
});

$app->put('/doctors/:id', function ($id) use ($app) {
	global $entityManager;
	$doctorEntity = $entityManager->find("DoctorEntity", $id);
	$entityManager->flush();
	$doctorDto = bindDoctorEntity($doctorEntity);
	$doctorDto->printData($app);
});

$app->delete('/doctors/:id', function ($id) use ($app) {
	global $entityManager;
	$doctorEntity = $entityManager->find("DoctorEntity", $id);
	$entityManager->remove($doctorEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/doctors/:id/doctorpractices/doctors', function ($id) use ($app) {
	global $entityManager;
   	$doctorPracticeEntities = $entityManager->getRepository("DoctorPracticeEntity")->findBy(array('doctor'=>$id));
    $doctorPractice = bindDoctorPracticeEntityArray($doctorPracticeEntities);
    $doctorPractice->printData($app);
});

$app->get('/doctors/:id/prescriptions/doctors', function ($id) use ($app) {
	global $entityManager;
   	$prescriptionEntities = $entityManager->getRepository("PrescriptionEntity")->findBy(array('doctor'=>$id));
    $prescription = bindPrescriptionEntityArray($prescriptionEntities);
    $prescription->printData($app);
});

function getdoctorQueryArray($app)    {
    $queryArray = array();
    $doctorId = $app->request()->get('doctorId');
    if ($doctorId != null)	{
        $queryArray['doctorId'] = $doctorId;
    }
    $user = $app->request()->get('user');
    if ($user != null)	{
        $queryArray['user'] = $user;
    }
    $icon = $app->request()->get('icon');
    if ($icon != null)	{
        $queryArray['icon'] = $icon;
    }
    $image = $app->request()->get('image');
    if ($image != null)	{
        $queryArray['image'] = $image;
    }
    $bio = $app->request()->get('bio');
    if ($bio != null)	{
        $queryArray['bio'] = $bio;
    }
    return $queryArray;
}

?>