<?php


namespace App\User\Service;

use App\Serializer\JsonSerializer;
use App\User\Model\UserRequest;
use App\User\Model\UserModel;

require_once(DB_DIR."/Entity.php");
require_once(DB_DIR."/EntityMapper.php");
require_once(BACKEND_DIR."/User/Repo.php");

class UserService {

    const USER_GROUP_ID = 1;

    private $userRepository;

    /**
     * UserService constructor.
     */
    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function createUser(UserRequest $request) {

        $userEntity = new UserEntity();

        $userEntity->setUsername($request->getUsername())
            ->setPasswordHash(sha1($request->getPassword()))
            ->setGroupId(self::USER_GROUP_ID);

        return EntityMapper::mapEntityToResponse(
            $this->userRepository->save($userEntity),
            UserModel::class
        );
    }

    /**
     * @param $id
     * @return object
     */
    public function getUser($id) {
        return EntityMapper::mapEntityToResponse(
            $this->userRepository->getById($id),
            UserModel::class
        );
    }

    public function isUserWithPasswordExists($username, $password) {
        return $this->userRepository->verifyPassword($username, $password);
    }
}