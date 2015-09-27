<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'DevicesTypeDto.php');

function bindDevicesTypeDto($devicesTypeDto)	{
	if ($devicesTypeDto != null)	{
	    global $entityManager;
		$devicesTypeEntity = new DevicesTypeEntity();
        $devicesTypeEntity->setDevicesTypeId($devicesTypeDto->getDevicesTypeId());
        $devicesTypeEntity->setTypeName($devicesTypeDto->getTypeName());
        $devicesTypeEntity->setCanPush($devicesTypeDto->getCanPush());
        return $devicesTypeEntity;
    }	else {
        return null;
    }
}

function bindDevicesTypeEntity($devicesTypeEntity)	{
	if ($devicesTypeEntity != null)	{
		$devicesTypeDto = new DevicesTypeDto();
        $devicesTypeDto->setDevicesTypeId($devicesTypeEntity->getDevicesTypeId());
        $devicesTypeDto->setTypeName($devicesTypeEntity->getTypeName());
        $devicesTypeDto->setCanPush($devicesTypeEntity->getCanPush());
        return $devicesTypeDto;
    }	else {
        return null;
    }
}

function bindDevicesTypeEntityArray($devicesTypeEntitys)   {
    $devicesTypeDtos = new DevicesTypeListDto();
    $devicesTypeDtoArray = array();
    foreach ($devicesTypeEntitys as $devicesTypeEntity => $value) {
        array_push($devicesTypeDtoArray, bindDevicesTypeEntity($value));
    }
    $devicesTypeDtos->setDevicesTypes($devicesTypeDtoArray);
    return $devicesTypeDtos;
}

?>