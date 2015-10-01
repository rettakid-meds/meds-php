<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'UserEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'UserBinding.php');

$app->get('/users', function () use ($app) {
	global $entityManager;
    $queryArray = getuserQueryArray($app);
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

$app->get('/users/:id/userdevices/users', function ($id) use ($app) {
	global $entityManager;
   	$userDeviceEntities = $entityManager->getRepository("UserDeviceEntity")->findBy(array('user'=>$id));
    $userDevice = bindUserDeviceEntityArray($userDeviceEntities);
    $userDevice->printData($app);
});

$app->get('/users/:id/doctors/users', function ($id) use ($app) {
	global $entityManager;
   	$doctorEntities = $entityManager->getRepository("DoctorEntity")->findBy(array('user'=>$id));
    $doctor = bindDoctorEntityArray($doctorEntities);
    $doctor->printData($app);
});

$app->get('/users/:id/appointments/users', function ($id) use ($app) {
	global $entityManager;
   	$appointmentEntities = $entityManager->getRepository("AppointmentEntity")->findBy(array('user'=>$id));
    $appointment = bindAppointmentEntityArray($appointmentEntities);
    $appointment->printData($app);
});

$app->get('/users/:id/prescriptions/users', function ($id) use ($app) {
	global $entityManager;
   	$prescriptionEntities = $entityManager->getRepository("PrescriptionEntity")->findBy(array('user'=>$id));
    $prescription = bindPrescriptionEntityArray($prescriptionEntities);
    $prescription->printData($app);
});

function getuserQueryArray($app)    {
    $queryArray = array();
    $userId = $app->request()->get('userId');
    if ($userId != null)	{
        $queryArray['userId'] = $userId;
    }
    $email = $app->request()->get('email');
    if ($email != null)	{
        $queryArray['email'] = $email;
    }
    $password = $app->request()->get('password');
    if ($password != null)	{
        $queryArray['password'] = $password;
    }
    $name = $app->request()->get('name');
    if ($name != null)	{
        $queryArray['name'] = $name;
    }
    $surname = $app->request()->get('surname');
    if ($surname != null)	{
        $queryArray['surname'] = $surname;
    }
    $phone = $app->request()->get('phone');
    if ($phone != null)	{
        $queryArray['phone'] = $phone;
    }
    $gender = $app->request()->get('gender');
    if ($gender != null)	{
        $queryArray['gender'] = $gender;
    }
    $age = $app->request()->get('age');
    if ($age != null)	{
        $queryArray['age'] = $age;
    }
    $userAllowPush = $app->request()->get('userAllowPush');
    if ($userAllowPush != null)	{
        $queryArray['userAllowPush'] = $userAllowPush;
    }
    return $queryArray;
}

?>