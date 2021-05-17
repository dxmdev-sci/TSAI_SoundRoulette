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

    public function createDescription(DescriptionRequest $request, TokenObject $tokenObject) {

        $descriptionEntity = new DescriptionEntity();

        $descriptionEntity->setAuthor($tokenObject->getUserId());
        $descriptionEntity->setDescription($request->getDescription());
        $descriptionEntity->setCreatedAt(date("Y-m-d"));

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


        $deletedRowsCount = $this->descriptionRepository->delete($id);

        if ($deletedRowsCount == 0) {
            throw new \Exception(sprintf("Failed user deletion with id: %d", $id));
        }
    }
}
