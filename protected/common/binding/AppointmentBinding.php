<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'AppointmentDto.php');

function bindAppointmentDto($appointmentDto)	{
	if ($appointmentDto != null)	{
	    global $entityManager;
		$appointmentEntity = new AppointmentEntity();
        $appointmentEntity->setAppointmentId($appointmentDto->getAppointmentId());
        $appointmentEntity->setPractice($entityManager->find("PracticeEntity", $appointmentDto->getPractice()->getPracticeId()));
        $appointmentEntity->setUser($entityManager->find("UserEntity", $appointmentDto->getUser()->getUserId()));
        $appointmentEntity->setEffFrm($appointmentDto->getEffFrm());
        $appointmentEntity->setEffTo($appointmentDto->getEffTo());
        return $appointmentEntity;
    }	else {
        return null;
    }
}

function bindAppointmentEntity($appointmentEntity)	{
	if ($appointmentEntity != null)	{
		$appointmentDto = new AppointmentDto();
        $appointmentDto->setAppointmentId($appointmentEntity->getAppointmentId());
        $appointmentDto->setPractice(bindPracticeEntity($appointmentEntity->getPractice()));
        $appointmentDto->setUser(bindUserEntity($appointmentEntity->getUser()));
        $appointmentDto->setEffFrm($appointmentEntity->getEffFrm());
        $appointmentDto->setEffTo($appointmentEntity->getEffTo());
        return $appointmentDto;
    }	else {
        return null;
    }
}

function bindAppointmentEntityArray($appointmentEntitys)   {
    $appointmentDtos = new AppointmentListDto();
    $appointmentDtoArray = array();
    foreach ($appointmentEntitys as $appointmentEntity => $value) {
        array_push($appointmentDtoArray, bindAppointmentEntity($value));
    }
    $appointmentDtos->setAppointments($appointmentDtoArray);
    return $appointmentDtos;
}

?>