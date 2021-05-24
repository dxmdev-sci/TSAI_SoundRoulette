<?php


namespace App\User\Service;


use App\Database\Entity\Entity;
use App\Database\Entity\EntityMapper;
use App\Helpers\Model\TokenObject;
use App\Helpers\ObjectMapper;
use App\Serializer\JsonSerializer;
use App\User\Entity\UserEntity;
use App\User\Model\UserRequest;
use App\User\Model\UserModel;
use App\User\Repository\UserRepository;

class UserService {

    const USER_GROUP_ID = 2;

    private $userRepository;

    /**
     * UserService constructor.
     */
    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function createUser(UserRequest $request) {

        $userEntity = new UserEntity();


        $userEntity->setUsername($request->getUsername());
        $userEntity->setPasswordHash(sha1($request->getPassword()));
        $userEntity->setGroupId(self::USER_GROUP_ID);

        return ObjectMapper::map(
          $this->userRepository->save($userEntity),
          UserModel::class
        );
    }

    /**
     * @param $id
     * @return object
     */
    public function getUser($id) {
        return ObjectMapper::map(
            $this->userRepository->getById($id),
            UserModel::class
        );
    }

    public function getAuthenticatedUser($username, $password) {
        return $this->userRepository->getUserByUsernameAndPassword($username, $password);
    }

    public function deleteUser($id, TokenObject $tokenObject) {
        //TODO Later when we change $userId to user object from token, check that user is in admin group.

        if ($id !== $tokenObject->getUserId()) {
            throw new \Exception("User does not have access to given resource");
        }

        $deletedRowsCount = $this->userRepository->delete($id);

        if ($deletedRowsCount == 0) {
            throw new \Exception(sprintf("Failed user deletion with id: %d", $id));
        }
    }

    public function updateUser($id, UserRequest $request){


        /** @var UserEntity $entity */
        $entity = $this->userRepository->getById($id);
        //change username
        if(!empty($request->getUsername()))
            $entity->setUsername($request->getUsername());
        //change password
        if(!empty($request->getPassword()))
            $entity->setPasswordHash(sha1($request->getPassword()));
        //change group_id
        if(!empty($request->getGroupId()))
            $entity->setGroupId($request->getGroupId());
        //change email
        if(!empty($request->getGroupId()))
            $entity->setEmail($request->getEmail());
        //change profileImgSrc
        if(!empty($request->getProfileImage()))
            $entity->setProfileImageSrc($request->getProfileImage());

        return ObjectMapper::map(
            $x->save($entity),
            UserModel::class
        );
    }
}
