<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'FieldDto.php');

function bindFieldDto($fieldDto)	{
	if ($fieldDto != null)	{
	    global $entityManager;
		$fieldEntity = new FieldEntity();
        $fieldEntity->setFieldId($fieldDto->getFieldId());
        $fieldEntity->setName($fieldDto->getName());
        $fieldEntity->setMapColor($fieldDto->getMapColor());
        return $fieldEntity;
    }	else {
        return null;
    }
}

function bindFieldEntity($fieldEntity)	{
	if ($fieldEntity != null)	{
		$fieldDto = new FieldDto();
        $fieldDto->setFieldId($fieldEntity->getFieldId());
        $fieldDto->setName($fieldEntity->getName());
        $fieldDto->setMapColor($fieldEntity->getMapColor());
        return $fieldDto;
    }	else {
        return null;
    }
}

function bindFieldEntityArray($fieldEntitys)   {
    $fieldDtos = new FieldListDto();
    $fieldDtoArray = array();
    foreach ($fieldEntitys as $fieldEntity => $value) {
        array_push($fieldDtoArray, bindFieldEntity($value));
    }
    $fieldDtos->setFields($fieldDtoArray);
    return $fieldDtos;
}

?>