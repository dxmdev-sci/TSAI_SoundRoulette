<?php


namespace App\Comment\Service;


use App\Database\Entity\Entity;
use App\Database\Entity\EntityMapper;
use App\Helpers\Model\TokenObject;
use App\Helpers\ObjectMapper;
use App\Serializer\JsonSerializer;
use App\Comment\Entity\CommentEntity;
use App\Comment\Model\CommentRequest;
use App\Comment\Model\CommentModel;
use App\Comment\Repository\CommentRepository;

class CommentService {


    private $commentRepository;
    /**
     * @var CommentRepository
     */

    /**
     * CommentService constructor.
     */
    public function __construct() {
        $this->commentRepository = new CommentRepository();
    }

    public function createComment(CommentRequest $request) {

        $commentEntity = new CommentEntity();

        $commentEntity->setDescription($request->getDescription());

        return ObjectMapper::map(
          $this->commentRepository->save($commentEntity),
          CommentModel::class
        );
    }

    /**
     * @param $id
     * @return object
     */
    public function getComment($id) {
        return ObjectMapper::map(
            $this->commentRepository->getById($id),
            CommentModel::class
        );
    }

    /**
     * @param $id
     * @param TokenObject $tokenObject
     * @throws \Exception
     */
    public function deleteComment($id, TokenObject $tokenObject) {
        //TODO Later when we change $userId to user object from token, check that user is in admin group.

        if ($id !== $tokenObject->getUserId()) {
            throw new \Exception("User does not have access to given resource");
        }

        $deletedRowsCount = $this->commentRepository->delete($id);

        if ($deletedRowsCount == 0) {
            throw new \Exception(sprintf("Failed user deletion with id: %d", $id));
        }
    }
}
