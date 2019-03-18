<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 18.3.19
 * Time: 22.55
 */

namespace AppBundle\Controller;


use AppBundle\Service\PostService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController
{


    /**
     * @var PostService $service
     */
    private $service;

    /**
     * PostController constructor.
     * @param PostService $service
     */
    public function __construct(PostService $service)
    {
        $this->service = $service;
    }


    /**
     * @Route(
     *     "/admin/user/{page}/{pageId}",
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
     *     "/admin/user/{id}",
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
     *     "/admin/user/{id}/edit",
     *     methods={"GET", "POST"},
     *     requirements={"id": "\d*?"}
     * )
     *
     * @Route(
     *     "/admin/user/new",
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
     *     "/admin/user/{id}/delete",
     *     methods={"DELETE"},
     *     requirements={"id": "\d*?"}
     * )
     */
    public function deleteAction( $id)
    {
        return new Response($this->service->findOneById($id));
    }



    /**
     * @Route(
     *     "/admin/user/{page}",
     *     methods={"GET"},
     *     requirements={"page": "\d*?"}
     * )
     */
    public function listAction( $page = 0)
    {
        return new Response(implode("\n", $this->service->findAll()));
    }



    /**
     * @Route(
     *     "/admin/user/{slug}",
     *     methods={"GET"},
     *     requirements={"slug": "\w*?"}
     * )
     */
    public function viewAction( $slug)
    {
        return new Response($this->service->findOneBySlug($slug));
    }


}