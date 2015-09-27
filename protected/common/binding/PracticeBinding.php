<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PracticeDto.php');

function bindPracticeDto($practiceDto)	{
	if ($practiceDto != null)	{
	    global $entityManager;
		$practiceEntity = new PracticeEntity();
        $practiceEntity->setPracticeId($practiceDto->getPracticeId());
        $practiceEntity->setName($practiceDto->getName());
        $practiceEntity->setEmail($practiceDto->getEmail());
        $practiceEntity->setLongitude($practiceDto->getLongitude());
        $practiceEntity->setLatitude($practiceDto->getLatitude());
        $practiceEntity->setAddress($practiceDto->getAddress());
        $practiceEntity->setPhone($practiceDto->getPhone());
        $practiceEntity->setFee($practiceDto->getFee());
        return $practiceEntity;
    }	else {
        return null;
    }
}

function bindPracticeEntity($practiceEntity)	{
	if ($practiceEntity != null)	{
		$practiceDto = new PracticeDto();
        $practiceDto->setPracticeId($practiceEntity->getPracticeId());
        $practiceDto->setName($practiceEntity->getName());
        $practiceDto->setEmail($practiceEntity->getEmail());
        $practiceDto->setLongitude($practiceEntity->getLongitude());
        $practiceDto->setLatitude($practiceEntity->getLatitude());
        $practiceDto->setAddress($practiceEntity->getAddress());
        $practiceDto->setPhone($practiceEntity->getPhone());
        $practiceDto->setFee($practiceEntity->getFee());
        return $practiceDto;
    }	else {
        return null;
    }
}

function bindPracticeEntityArray($practiceEntitys)   {
    $practiceDtos = new PracticeListDto();
    $practiceDtoArray = array();
    foreach ($practiceEntitys as $practiceEntity => $value) {
        array_push($practiceDtoArray, bindPracticeEntity($value));
    }
    $practiceDtos->setPractices($practiceDtoArray);
    return $practiceDtos;
}

?>