<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'DoctorDto.php');

function bindDoctorDto($doctorDto)	{
	if ($doctorDto != null)	{
	    global $entityManager;
		$doctorEntity = new DoctorEntity();
        $doctorEntity->setDoctorId($doctorDto->getDoctorId());
        $doctorEntity->setPractice($entityManager->find("PracticeEntity", $doctorDto->getPractice()->getPracticeId()));
        $doctorEntity->setUser($entityManager->find("UserEntity", $doctorDto->getUser()->getUserId()));
        return $doctorEntity;
    }	else {
        return null;
    }
}

function bindDoctorEntity($doctorEntity)	{
	if ($doctorEntity != null)	{
		$doctorDto = new DoctorDto();
        $doctorDto->setDoctorId($doctorEntity->getDoctorId());
        $doctorDto->setPractice(bindPracticeEntity($doctorEntity->getPractice()));
        $doctorDto->setUser(bindUserEntity($doctorEntity->getUser()));
        return $doctorDto;
    }	else {
        return null;
    }
}

function bindDoctorEntityArray($doctorEntitys)   {
    $doctorDtos = new DoctorListDto();
    $doctorDtoArray = array();
    foreach ($doctorEntitys as $doctorEntity => $value) {
        array_push($doctorDtoArray, bindDoctorEntity($value));
    }
    $doctorDtos->setDoctors($doctorDtoArray);
    return $doctorDtos;
}

?>