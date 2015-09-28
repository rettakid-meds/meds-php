<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'ImageDto.php');

function bindImageDto($imageDto)	{
	if ($imageDto != null)	{
	    global $entityManager;
		$imageEntity = new ImageEntity();
        $imageEntity->setImageId($imageDto->getImageId());
        $imageEntity->setFile($entityManager->find("FileEntity", $imageDto->getFile()->getFileId()));
        $imageEntity->setWidth($imageDto->getWidth());
        $imageEntity->setHeight($imageDto->getHeight());
        return $imageEntity;
    }	else {
        return null;
    }
}

function bindImageEntity($imageEntity)	{
	if ($imageEntity != null)	{
		$imageDto = new ImageDto();
        $imageDto->setImageId($imageEntity->getImageId());
        $imageDto->setFile(bindFileEntity($imageEntity->getFile()));
        $imageDto->setWidth($imageEntity->getWidth());
        $imageDto->setHeight($imageEntity->getHeight());
        return $imageDto;
    }	else {
        return null;
    }
}

function bindImageEntityArray($imageEntitys)   {
    $imageDtos = new ImageListDto();
    $imageDtoArray = array();
    foreach ($imageEntitys as $imageEntity => $value) {
        array_push($imageDtoArray, bindImageEntity($value));
    }
    $imageDtos->setImages($imageDtoArray);
    return $imageDtos;
}

?>