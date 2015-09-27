<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'LocationDto.php');

function bindLocationDto($locationDto)	{
	if ($locationDto != null)	{
	    global $entityManager;
		$locationEntity = new LocationEntity();
        $locationEntity->setLocationId($locationDto->getLocationId());
        $locationEntity->setLongitude($locationDto->getLongitude());
        $locationEntity->setLatitude($locationDto->getLatitude());
        $locationEntity->setAddress($locationDto->getAddress());
        return $locationEntity;
    }	else {
        return null;
    }
}

function bindLocationEntity($locationEntity)	{
	if ($locationEntity != null)	{
		$locationDto = new LocationDto();
        $locationDto->setLocationId($locationEntity->getLocationId());
        $locationDto->setLongitude($locationEntity->getLongitude());
        $locationDto->setLatitude($locationEntity->getLatitude());
        $locationDto->setAddress($locationEntity->getAddress());
        return $locationDto;
    }	else {
        return null;
    }
}

function bindLocationEntityArray($locationEntitys)   {
    $locationDtos = new LocationListDto();
    $locationDtoArray = array();
    foreach ($locationEntitys as $locationEntity => $value) {
        array_push($locationDtoArray, bindLocationEntity($value));
    }
    $locationDtos->setLocations($locationDtoArray);
    return $locationDtos;
}

?>