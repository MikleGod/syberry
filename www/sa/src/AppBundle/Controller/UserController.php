<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 18.3.19
 * Time: 16.16
 */

namespace AppBundle\Controller;


use AppBundle\Service\UserService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController
{


    /**
     * @var UserService service
     */
    private $service;

    /**
     * UserController constructor.
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }


    /**
     * @Route(
     *     "/admin/{page}/{pageId}",
     *     methods={"GET"},
     *     requirements={"page": "^(?!new).*?", "pageId": "\d*?"}
     * )
     */
    public function indexAction( $page="simple", $pageId=0)
    {
        return new Response(implode("\n", $this->service->findAll()));
    }


    /**
     * @Route(
     *     "/admin/{id}",
     *     methods={"GET"},
     *     requirements={"id": "\d*?"}
     * )
     */
    public function showAction( $id)
    {
        return new Response($this->service->findOneById($id));
    }

    /**
     * @Route(
     *     "/admin/{id}/edit",
     *     methods={"GET", "POST"},
     *     requirements={"id": "\d*?"}
     * )
     *
     * @Route(
     *     "/admin/new",
     *     methods={"GET", "POST"},
     *     defaults={"id": "-1"}
     * )
     * @param int $id
     * @return Response
     */
    public function editAction(int $id)
    {
        if ($id != -1) {
            return new Response($this->service->findOneById($id));
        } else {
            return new Response("new");
        }
    }

    /**
     * @Route(
     *     "/admin/{id}/delete",
     *     methods={"DELETE"},
     *     requirements={"id": "\d*?"}
     * )
     */
    public function deleteAction( $id)
    {
        return new Response($this->service->findOneById($id));
    }

}