<?php


namespace App\Description\Service;


use App\Database\Entity\Entity;
use App\Database\Entity\EntityMapper;
use App\Helpers\Model\TokenObject;
use App\Helpers\ObjectMapper;
use App\Serializer\JsonSerializer;
use App\Description\Entity\DescriptionEntity;
use App\Description\Model\DescriptionRequest;
use App\Description\Model\DescriptionModel;
use App\Description\Repository\DescriptionRepository;

class DescriptionService {


    private $descriptionRepository;
    /**
     * @var DescriptionRepository
     */

    /**
     * DescriptionService constructor.
     */
    public function __construct() {
        $this->descriptionRepository = new DescriptionRepository();
    }

    public function createDescription(DescriptionRequest $request) {

        $descriptionEntity = new DescriptionEntity();

        $descriptionEntity->setDescription($request->getDescription());

        return ObjectMapper::map(
          $this->descriptionRepository->save($descriptionEntity),
          DescriptionModel::class
        );
    }

    /**
     * @param $id
     * @return object
     */
    public function getDescription($id) {
        return ObjectMapper::map(
            $this->descriptionRepository->getById($id),
            DescriptionModel::class
        );
    }

    /**
     * @param $id
     * @param TokenObject $tokenObject
     * @throws \Exception
     */
    public function deleteDescription($id, TokenObject $tokenObject) {
        //TODO Later when we change $userId to user object from token, check that user is in admin group.

        if ($id !== $tokenObject->getUserId()) {
            throw new \Exception("User does not have access to given resource");
        }

        $deletedRowsCount = $this->descriptionRepository->delete($id);

        if ($deletedRowsCount == 0) {
            throw new \Exception(sprintf("Failed user deletion with id: %d", $id));
        }
    }
}
