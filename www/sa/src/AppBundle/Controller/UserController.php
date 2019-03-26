<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 18.3.19
 * Time: 16.16
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Form\UserForm;
use AppBundle\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{


    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    /**
     * @var EntityManagerInterface $entityManager
     */
    private $entityManager;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(UserRepository $userRepository, EntityManagerInterface $entityManager)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
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
     * @param Request $request
     * @return Response
     */
    public function editAction(int $id, Request $request)
    {
        if ($id !== -1) {
            $user = $this->userRepository->findOneBy(['id' => $id]);
        } else {
            $user = new User();
        }

        $form = $this->createForm(UserForm::class, $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            return $this->redirect($this->generateUrl('user_index'));
        }
        return $this->render('@App/post/edit.html.twig', [
            'form' => $form->createView()
        ]);
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
        $user = $this->userRepository->find($id);
        $this->entityManager->remove($user);
        $this->entityManager->flush();
        $this->addFlash('success', 'Deleting was OK!');
        return $this->redirect($this->generateUrl('user_index'));
    }

}