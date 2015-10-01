<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'ImageDto.php');
require_once ($PROJ_PERSISTENCE_ENTITY_ROOT.'ImageEntity.php');
require_once ($PROJ_COMMON_BINDING_ROOT.'ImageBinding.php');

$app->get('/images', function () use ($app) {
	global $entityManager;
    $queryArray = getimageQueryArray($app);
    $imageEntities = $entityManager->getRepository("ImageEntity")->findBy(array());
    $images = bindImageEntityArray($imageEntities);
    $images->printData($app);
});

$app->get('/images/:id', function ($id) use ($app) {
	global $entityManager;
	$imageEntity = $entityManager->find("ImageEntity", $id);
	$imageDto = bindImageEntity($imageEntity);
	$imageDto->printData($app);
});

$app->post('/images', function () use ($app) {
	global $entityManager;
	$imageDto = new ImageDto();
	$imageDto = $imageDto->bindXml($app);
	$imageEntity = bindImageDto($imageDto);
	$entityManager->persist($imageEntity);
	$entityManager->flush();
	$imageDto = bindImageEntity($imageEntity);
	$imageDto->printData($app);
});

$app->post('/images/list', function () use ($app) {
	global $entityManager;
	$imageListDto = new ImageListDto();
	$imageListDto = $imageListDto->bindXml($app);
	$imagesArray = array();
	foreach ($imageListDto->getImages() as $imageDto) {
		$imageEntity = bindImageDto($imageDto);
		$entityManager->persist($imageEntity);
		$entityManager->flush();
		array_push($imagesArray,bindImageEntity($imageEntity));
	}
	$imageListDto = new ImageListDto();
	$imageListDto->setImages($imagesArray);
	$imageListDto->printData($app);
});

$app->put('/images/:id', function ($id) use ($app) {
	global $entityManager;
	$imageEntity = $entityManager->find("ImageEntity", $id);
	$entityManager->flush();
	$imageDto = bindImageEntity($imageEntity);
	$imageDto->printData($app);
});

$app->delete('/images/:id', function ($id) use ($app) {
	global $entityManager;
	$imageEntity = $entityManager->find("ImageEntity", $id);
	$entityManager->remove($imageEntity);
	$entityManager->flush();
});

/*Referances*/

$app->get('/images/:id/practices/images', function ($id) use ($app) {
	global $entityManager;
   	$practiceEntities = $entityManager->getRepository("PracticeEntity")->findBy(array('image'=>$id));
    $practice = bindPracticeEntityArray($practiceEntities);
    $practice->printData($app);
});

$app->get('/images/:id/doctors/images', function ($id) use ($app) {
	global $entityManager;
   	$doctorEntities = $entityManager->getRepository("DoctorEntity")->findBy(array('image'=>$id));
    $doctor = bindDoctorEntityArray($doctorEntities);
    $doctor->printData($app);
});

$app->get('/images/:id/doctors/icons', function ($id) use ($app) {
	global $entityManager;
   	$doctorEntities = $entityManager->getRepository("DoctorEntity")->findBy(array('icon'=>$id));
    $doctor = bindDoctorEntityArray($doctorEntities);
    $doctor->printData($app);
});

function getimageQueryArray($app)    {
    $queryArray = array();
    $imageId = $app->request()->get('imageId');
    if ($imageId != null)	{
        $queryArray['imageId'] = $imageId;
    }
    $file = $app->request()->get('file');
    if ($file != null)	{
        $queryArray['file'] = $file;
    }
    $width = $app->request()->get('width');
    if ($width != null)	{
        $queryArray['width'] = $width;
    }
    $height = $app->request()->get('height');
    if ($height != null)	{
        $queryArray['height'] = $height;
    }
    return $queryArray;
}

?>