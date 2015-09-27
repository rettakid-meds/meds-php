<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'PrescriptionItemDto.php');

function bindPrescriptionItemDto($prescriptionItemDto)	{
	if ($prescriptionItemDto != null)	{
	    global $entityManager;
		$prescriptionItemEntity = new PrescriptionItemEntity();
        $prescriptionItemEntity->setPrescriptionItemId($prescriptionItemDto->getPrescriptionItemId());
        $prescriptionItemEntity->setPrescription($entityManager->find("PrescriptionEntity", $prescriptionItemDto->getPrescription()->getPrescriptionId()));
        $prescriptionItemEntity->setName($prescriptionItemDto->getName());
        return $prescriptionItemEntity;
    }	else {
        return null;
    }
}

function bindPrescriptionItemEntity($prescriptionItemEntity)	{
	if ($prescriptionItemEntity != null)	{
		$prescriptionItemDto = new PrescriptionItemDto();
        $prescriptionItemDto->setPrescriptionItemId($prescriptionItemEntity->getPrescriptionItemId());
        $prescriptionItemDto->setPrescription(bindPrescriptionEntity($prescriptionItemEntity->getPrescription()));
        $prescriptionItemDto->setName($prescriptionItemEntity->getName());
        return $prescriptionItemDto;
    }	else {
        return null;
    }
}

function bindPrescriptionItemEntityArray($prescriptionItemEntitys)   {
    $prescriptionItemDtos = new PrescriptionItemListDto();
    $prescriptionItemDtoArray = array();
    foreach ($prescriptionItemEntitys as $prescriptionItemEntity => $value) {
        array_push($prescriptionItemDtoArray, bindPrescriptionItemEntity($value));
    }
    $prescriptionItemDtos->setPrescriptionItems($prescriptionItemDtoArray);
    return $prescriptionItemDtos;
}

?>