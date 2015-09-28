<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'FileDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'FileEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'FileBinding.php');

$app->get('/files', function () use ($app) {
	global $entityManager;
   	$fileEntities = $entityManager->getRepository("FileEntity")->findBy(array());
    $files = bindFileEntityArray($fileEntities);
    $files->printData($app);
});

$app->get('/files/:id', function ($id) use ($app) {
	global $entityManager;
	$fileEntity = $entityManager->find("FileEntity", $id);
	$fileDto = bindFileEntity($fileEntity);
	$fileDto->printData($app);
});

$app->post('/files', function () use ($app) {
	global $entityManager;
	$fileDto = new FileDto();
	$fileDto = $fileDto->bindXml($app);
	$fileEntity = bindFileDto($fileDto);
	$entityManager->persist($fileEntity);
	$entityManager->flush();
	$fileDto = bindFileEntity($fileEntity);
	$fileDto->printData($app);
});

$app->post('/files/list', function () use ($app) {
	global $entityManager;
	$fileListDto = new FileListDto();
	$fileListDto = $fileListDto->bindXml($app);
	$filesArray = array();
	foreach ($fileListDto->getFiles() as $fileDto) {
		$fileEntity = bindFileDto($fileDto);
		$entityManager->persist($fileEntity);
		$entityManager->flush();
		array_push($filesArray,bindFileEntity($fileEntity));
	}
	$fileListDto = new FileListDto();
	$fileListDto->setFiles($filesArray);
	$fileListDto->printData($app);
});

$app->put('/files/:id', function ($id) use ($app) {
	global $entityManager;
	$fileEntity = $entityManager->find("FileEntity", $id);
	$entityManager->flush();
	$fileDto = bindFileEntity($fileEntity);
	$fileDto->printData($app);
});

$app->delete('/files/:id', function ($id) use ($app) {
	global $entityManager;
	$fileEntity = $entityManager->find("FileEntity", $id);
	$entityManager->remove($fileEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/files/:id/files', function ($id) use ($app) {
	global $entityManager;
   	$imageEntities = $entityManager->getRepository("ImageEntity")->findBy(array('file'=>$id));
    $image = bindImageEntityArray($imageEntities);
    $image->printData($app);
});

$app->get('/files/:id/files', function ($id) use ($app) {
	global $entityManager;
   	$prescriptionEntities = $entityManager->getRepository("PrescriptionEntity")->findBy(array('file'=>$id));
    $prescription = bindPrescriptionEntityArray($prescriptionEntities);
    $prescription->printData($app);
});

?>