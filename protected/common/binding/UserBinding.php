<?php

require_once ($PROJ_PRESENTATION_DTO_ROOT.'UserDto.php');

function bindUserDto($userDto)	{
	if ($userDto != null)	{
	    global $entityManager;
		$userEntity = new UserEntity();
        $userEntity->setUserId($userDto->getUserId());
        $userEntity->setEmail($userDto->getEmail());
        $userEntity->setPassword($userDto->getPassword());
        $userEntity->setName($userDto->getName());
        $userEntity->setSurname($userDto->getSurname());
        $userEntity->setPhone($userDto->getPhone());
        $userEntity->setGender($userDto->getGender());
        $userEntity->setAge($userDto->getAge());
        $userEntity->setUserAllowPush($userDto->getUserAllowPush());
        return $userEntity;
    }	else {
        return null;
    }
}

function bindUserEntity($userEntity)	{
	if ($userEntity != null)	{
		$userDto = new UserDto();
        $userDto->setUserId($userEntity->getUserId());
        $userDto->setEmail($userEntity->getEmail());
        $userDto->setPassword($userEntity->getPassword());
        $userDto->setName($userEntity->getName());
        $userDto->setSurname($userEntity->getSurname());
        $userDto->setPhone($userEntity->getPhone());
        $userDto->setGender($userEntity->getGender());
        $userDto->setAge($userEntity->getAge());
        $userDto->setUserAllowPush($userEntity->getUserAllowPush());
        return $userDto;
    }	else {
        return null;
    }
}

function bindUserEntityArray($userEntitys)   {
    $userDtos = new UserListDto();
    $userDtoArray = array();
    foreach ($userEntitys as $userEntity => $value) {
        array_push($userDtoArray, bindUserEntity($value));
    }
    $userDtos->setUsers($userDtoArray);
    return $userDtos;
}

?>