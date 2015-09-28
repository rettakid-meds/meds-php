<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PrescriptionDto.php');

function bindPrescriptionDto($prescriptionDto)	{
	if ($prescriptionDto != null)	{
	    global $entityManager;
		$prescriptionEntity = new PrescriptionEntity();
        $prescriptionEntity->setPrescriptionId($prescriptionDto->getPrescriptionId());
        $prescriptionEntity->setAppointment($entityManager->find("AppointmentEntity", $prescriptionDto->getAppointment()->getAppointmentId()));
        $prescriptionEntity->setDoctor($entityManager->find("DoctorEntity", $prescriptionDto->getDoctor()->getDoctorId()));
        $prescriptionEntity->setUser($entityManager->find("UserEntity", $prescriptionDto->getUser()->getUserId()));
        $prescriptionEntity->setFile($entityManager->find("FileEntity", $prescriptionDto->getFile()->getFileId()));
        $prescriptionEntity->setEffFrm($prescriptionDto->getEffFrm());
        $prescriptionEntity->setEffTo($prescriptionDto->getEffTo());
        return $prescriptionEntity;
    }	else {
        return null;
    }
}

function bindPrescriptionEntity($prescriptionEntity)	{
	if ($prescriptionEntity != null)	{
		$prescriptionDto = new PrescriptionDto();
        $prescriptionDto->setPrescriptionId($prescriptionEntity->getPrescriptionId());
        $prescriptionDto->setAppointment(bindAppointmentEntity($prescriptionEntity->getAppointment()));
        $prescriptionDto->setDoctor(bindDoctorEntity($prescriptionEntity->getDoctor()));
        $prescriptionDto->setUser(bindUserEntity($prescriptionEntity->getUser()));
        $prescriptionDto->setFile(bindFileEntity($prescriptionEntity->getFile()));
        $prescriptionDto->setEffFrm($prescriptionEntity->getEffFrm());
        $prescriptionDto->setEffTo($prescriptionEntity->getEffTo());
        return $prescriptionDto;
    }	else {
        return null;
    }
}

function bindPrescriptionEntityArray($prescriptionEntitys)   {
    $prescriptionDtos = new PrescriptionListDto();
    $prescriptionDtoArray = array();
    foreach ($prescriptionEntitys as $prescriptionEntity => $value) {
        array_push($prescriptionDtoArray, bindPrescriptionEntity($value));
    }
    $prescriptionDtos->setPrescriptions($prescriptionDtoArray);
    return $prescriptionDtos;
}

?>