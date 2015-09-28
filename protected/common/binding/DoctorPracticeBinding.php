<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'DoctorPracticeDto.php');

function bindDoctorPracticeDto($doctorPracticeDto)	{
	if ($doctorPracticeDto != null)	{
	    global $entityManager;
		$doctorPracticeEntity = new DoctorPracticeEntity();
        $doctorPracticeEntity->setMedsDoctorPracticeId($doctorPracticeDto->getMedsDoctorPracticeId());
        $doctorPracticeEntity->setPractice($entityManager->find("PracticeEntity", $doctorPracticeDto->getPractice()->getPracticeId()));
        $doctorPracticeEntity->setDoctor($entityManager->find("DoctorEntity", $doctorPracticeDto->getDoctor()->getDoctorId()));
        return $doctorPracticeEntity;
    }	else {
        return null;
    }
}

function bindDoctorPracticeEntity($doctorPracticeEntity)	{
	if ($doctorPracticeEntity != null)	{
		$doctorPracticeDto = new DoctorPracticeDto();
        $doctorPracticeDto->setMedsDoctorPracticeId($doctorPracticeEntity->getMedsDoctorPracticeId());
        $doctorPracticeDto->setPractice(bindPracticeEntity($doctorPracticeEntity->getPractice()));
        $doctorPracticeDto->setDoctor(bindDoctorEntity($doctorPracticeEntity->getDoctor()));
        return $doctorPracticeDto;
    }	else {
        return null;
    }
}

function bindDoctorPracticeEntityArray($doctorPracticeEntitys)   {
    $doctorPracticeDtos = new DoctorPracticeListDto();
    $doctorPracticeDtoArray = array();
    foreach ($doctorPracticeEntitys as $doctorPracticeEntity => $value) {
        array_push($doctorPracticeDtoArray, bindDoctorPracticeEntity($value));
    }
    $doctorPracticeDtos->setDoctorPractices($doctorPracticeDtoArray);
    return $doctorPracticeDtos;
}

?>