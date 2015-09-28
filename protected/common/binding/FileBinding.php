<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'FileDto.php');

function bindFileDto($fileDto)	{
	if ($fileDto != null)	{
	    global $entityManager;
		$fileEntity = new FileEntity();
        $fileEntity->setFileId($fileDto->getFileId());
        $fileEntity->setGuid($fileDto->getGuid());
        $fileEntity->setName($fileDto->getName());
        $fileEntity->setEffFrm($fileDto->getEffFrm());
        return $fileEntity;
    }	else {
        return null;
    }
}

function bindFileEntity($fileEntity)	{
	if ($fileEntity != null)	{
		$fileDto = new FileDto();
        $fileDto->setFileId($fileEntity->getFileId());
        $fileDto->setGuid($fileEntity->getGuid());
        $fileDto->setName($fileEntity->getName());
        $fileDto->setEffFrm($fileEntity->getEffFrm());
        return $fileDto;
    }	else {
        return null;
    }
}

function bindFileEntityArray($fileEntitys)   {
    $fileDtos = new FileListDto();
    $fileDtoArray = array();
    foreach ($fileEntitys as $fileEntity => $value) {
        array_push($fileDtoArray, bindFileEntity($value));
    }
    $fileDtos->setFiles($fileDtoArray);
    return $fileDtos;
}

?>