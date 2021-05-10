<?php


namespace App\Album\Service;


use App\Database\Entity\Entity;
use App\Database\Entity\EntityMapper;
use App\Helpers\Model\TokenObject;
use App\Helpers\ObjectMapper;
use App\Serializer\JsonSerializer;
use App\Album\Entity\AlbumEntity;
use App\Album\Model\AlbumRequest;
use App\Album\Model\AlbumModel;
use App\Album\Repository\AlbumRepository;

class AlbumService {


    private $albumRepository;
    /**
     * @var AlbumRepository
     */

    /**
     * AlbumService constructor.
     */
    public function __construct() {
        $this->albumRepository = new AlbumRepository();
    }

    public function createAlbum(AlbumRequest $request) {

        $albumEntity = new AlbumEntity();

        $albumEntity->setAlbum($request->getDescription());

        return ObjectMapper::map(
          $this->albumRepository->save($albumEntity),
          AlbumModel::class
        );
    }

    /**
     * @param $id
     * @return object
     */
    public function getAlbum($id) {
        return ObjectMapper::map(
            $this->albumRepository->getById($id),
            AlbumModel::class
        );
    }

    /**
     * @param $id
     * @param TokenObject $tokenObject
     * @throws \Exception
     */
    public function deleteAlbum($id, TokenObject $tokenObject) {
        //TODO Later when we change $userId to user object from token, check that user is in admin group.

        if ($id !== $tokenObject->getUserId()) {
            throw new \Exception("User does not have access to given resource");
        }

        $deletedRowsCount = $this->albumRepository->delete($id);

        if ($deletedRowsCount == 0) {
            throw new \Exception(sprintf("Failed user deletion with id: %d", $id));
        }
    }
}
