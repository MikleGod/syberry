<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 18.3.19
 * Time: 16.16
 */

namespace AppBundle\Controller;


use AppBundle\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{


    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @Route(
     *     path="/admin/{page}/{pageId}",
     *     methods={"GET"},
     *     name="user_index",
     *     requirements={"page": "^(?!new)[a-zA-Z]*?", "pageId": "\d*?"}
     * )
     */
    public function indexAction($page = "simple", $pageId = 0)
    {
        return $this->render('@App/user/index.html.twig', [
            'users' => $this->userRepository->findAll()
        ]);
    }


    /**
     * @Route(
     *     "/admin/{id}",
     *     methods={"GET"},
     *     name="user_show",
     *     requirements={"id": "\d*?"}
     * )
     */
    public function showAction($id)
    {
        return $this->render('@App/user/show.html.twig', [
            'user' => $this->userRepository->find($id)
        ]);
    }

    /**
     * @Route(
     *     "/admin/{id}/edit",
     *     methods={"GET", "POST"},
     *     name="user_edit",
     *     requirements={"id": "\d*?"}
     * )
     *
     * @Route(
     *     "/admin/new",
     *     methods={"GET", "POST"},
     *     name="user_new",
     *     defaults={"id": "-1"}
     * )
     * @param int $id
     * @return Response
     */
    public function editAction(int $id)
    {
        return $this->render('@App/user/edit.html.twig');
    }

    /**
     * @Route(
     *     "/admin/{id}/delete",
     *     methods={"POST"},
     *     name="user_delete",
     *     requirements={"id": "\d*?"}
     * )
     */
    public function deleteAction($id)
    {
        $this->addFlash('success', 'Deleting was OK!');
        return $this->redirect($this->generateUrl('user_index'));
    }

}