<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PracticeFieldDto.php');

function bindPracticeFieldDto($practiceFieldDto)	{
	if ($practiceFieldDto != null)	{
	    global $entityManager;
		$practiceFieldEntity = new PracticeFieldEntity();
        $practiceFieldEntity->setPracticeFieldId($practiceFieldDto->getPracticeFieldId());
        $practiceFieldEntity->setField($entityManager->find("FieldEntity", $practiceFieldDto->getField()->getFieldId()));
        $practiceFieldEntity->setPractice($entityManager->find("PracticeEntity", $practiceFieldDto->getPractice()->getPracticeId()));
        return $practiceFieldEntity;
    }	else {
        return null;
    }
}

function bindPracticeFieldEntity($practiceFieldEntity)	{
	if ($practiceFieldEntity != null)	{
		$practiceFieldDto = new PracticeFieldDto();
        $practiceFieldDto->setPracticeFieldId($practiceFieldEntity->getPracticeFieldId());
        $practiceFieldDto->setField(bindFieldEntity($practiceFieldEntity->getField()));
        $practiceFieldDto->setPractice(bindPracticeEntity($practiceFieldEntity->getPractice()));
        return $practiceFieldDto;
    }	else {
        return null;
    }
}

function bindPracticeFieldEntityArray($practiceFieldEntitys)   {
    $practiceFieldDtos = new PracticeFieldListDto();
    $practiceFieldDtoArray = array();
    foreach ($practiceFieldEntitys as $practiceFieldEntity => $value) {
        array_push($practiceFieldDtoArray, bindPracticeFieldEntity($value));
    }
    $practiceFieldDtos->setPracticeFields($practiceFieldDtoArray);
    return $practiceFieldDtos;
}

?>