<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'UserEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'UserBinding.php');

$app->get('/users', function () use ($app) {
	global $entityManager;
   	$userEntities = $entityManager->getRepository("UserEntity")->findBy(array());
    $users = bindUserEntityArray($userEntities);
    $users->printData($app);
});

$app->get('/users/:id', function ($id) use ($app) {
	global $entityManager;
	$userEntity = $entityManager->find("UserEntity", $id);
	$userDto = bindUserEntity($userEntity);
	$userDto->printData($app);
});

$app->post('/users', function () use ($app) {
	global $entityManager;
	$userDto = new UserDto();
	$userDto = $userDto->bindXml($app);
	$userEntity = bindUserDto($userDto);
	$entityManager->persist($userEntity);
	$entityManager->flush();
	$userDto = bindUserEntity($userEntity);
	$userDto->printData($app);
});

$app->post('/users/list', function () use ($app) {
	global $entityManager;
	$userListDto = new UserListDto();
	$userListDto = $userListDto->bindXml($app);
	$usersArray = array();
	foreach ($userListDto->getUsers() as $userDto) {
		$userEntity = bindUserDto($userDto);
		$entityManager->persist($userEntity);
		$entityManager->flush();
		array_push($usersArray,bindUserEntity($userEntity));
	}
	$userListDto = new UserListDto();
	$userListDto->setUsers($usersArray);
	$userListDto->printData($app);
});

$app->put('/users/:id', function ($id) use ($app) {
	global $entityManager;
	$userEntity = $entityManager->find("UserEntity", $id);
	$entityManager->flush();
	$userDto = bindUserEntity($userEntity);
	$userDto->printData($app);
});

$app->delete('/users/:id', function ($id) use ($app) {
	global $entityManager;
	$userEntity = $entityManager->find("UserEntity", $id);
	$entityManager->remove($userEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/users/:id/userdevices', function ($id) use ($app) {
	global $entityManager;
   	$userDeviceEntities = $entityManager->getRepository("UserDeviceEntity")->findBy(array('user'=>$id));
    $userDevice = bindUserDeviceEntityArray($userDeviceEntities);
    $userDevice->printData($app);
});

$app->get('/users/:id/doctors', function ($id) use ($app) {
	global $entityManager;
   	$doctorEntities = $entityManager->getRepository("DoctorEntity")->findBy(array('user'=>$id));
    $doctor = bindDoctorEntityArray($doctorEntities);
    $doctor->printData($app);
});

$app->get('/users/:id/appointments', function ($id) use ($app) {
	global $entityManager;
   	$appointmentEntities = $entityManager->getRepository("AppointmentEntity")->findBy(array('user'=>$id));
    $appointment = bindAppointmentEntityArray($appointmentEntities);
    $appointment->printData($app);
});

$app->get('/users/:id/prescriptions', function ($id) use ($app) {
	global $entityManager;
   	$prescriptionEntities = $entityManager->getRepository("PrescriptionEntity")->findBy(array('user'=>$id));
    $prescription = bindPrescriptionEntityArray($prescriptionEntities);
    $prescription->printData($app);
});

?>