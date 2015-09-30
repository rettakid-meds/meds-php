<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'DoctorDto.php');

function bindDoctorDto($doctorDto)	{
	if ($doctorDto != null)	{
	    global $entityManager;
		$doctorEntity = new DoctorEntity();
        $doctorEntity->setDoctorId($doctorDto->getDoctorId());
        $doctorEntity->setUser($entityManager->find("UserEntity", $doctorDto->getUser()->getUserId()));
        $doctorEntity->setIcon($entityManager->find("IconEntity", $doctorDto->getIcon()->getIconId()));
        $doctorEntity->setImage($entityManager->find("ImageEntity", $doctorDto->getImage()->getImageId()));
        $doctorEntity->setBio($entityManager->find("BioEntity", $doctorDto->getBio()->getBioId()));
        return $doctorEntity;
    }	else {
        return null;
    }
}

function bindDoctorEntity($doctorEntity)	{
	if ($doctorEntity != null)	{
		$doctorDto = new DoctorDto();
        $doctorDto->setDoctorId($doctorEntity->getDoctorId());
        $doctorDto->setUser(bindUserEntity($doctorEntity->getUser()));
        $doctorDto->setIcon(bindDataContentEntity($doctorEntity->getIcon()));
        $doctorDto->setImage(bindImageEntity($doctorEntity->getImage()));
        $doctorDto->setBio(bindDataContentEntity($doctorEntity->getBio()));
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