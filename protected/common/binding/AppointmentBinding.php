<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'AppointmentDto.php');

function bindAppointmentDto($appointmentDto)	{
	if ($appointmentDto != null)	{
	    global $entityManager;
		$appointmentEntity = new AppointmentEntity();
        $appointmentEntity->setAppointmentId($appointmentDto->getAppointmentId());
        $appointmentEntity->setPractice($entityManager->find("PracticeEntity", $appointmentDto->getPractice()->getPracticeId()));
        $appointmentEntity->setUser($entityManager->find("UserEntity", $appointmentDto->getUser()->getUserId()));
        $appointmentEntity->setNote($entityManager->find("NoteEntity", $appointmentDto->getNote()->getNoteId()));
        $appointmentEntity->setExpectedFrm($appointmentDto->getExpectedFrm());
        $appointmentEntity->setExpectedTo($appointmentDto->getExpectedTo());
        $appointmentEntity->setActualFrm($appointmentDto->getActualFrm());
        $appointmentEntity->setActualTo($appointmentDto->getActualTo());
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
        $appointmentDto->setNote(bindDataContentEntity($appointmentEntity->getNote()));
        $appointmentDto->setExpectedFrm($appointmentEntity->getExpectedFrm());
        $appointmentDto->setExpectedTo($appointmentEntity->getExpectedTo());
        $appointmentDto->setActualFrm($appointmentEntity->getActualFrm());
        $appointmentDto->setActualTo($appointmentEntity->getActualTo());
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